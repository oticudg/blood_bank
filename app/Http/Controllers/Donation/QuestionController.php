<?php

namespace App\Http\Controllers\Donation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Donation\ { Question, BloodDonor, BloodDonorsQuestions };

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'id' => 'required|numeric',
            'questions' => 'required|array'
        ]);
        $question = (BloodDonor::findOrFail($data['id'])->questions->max('question') ?: 0) + 1;
        foreach ($data['questions'] as $d) {
            BloodDonorsQuestions::create([
                'answer' => $d['answer'],
                'blood_donor_id' => $data['id'],
                'question' => $question,
                'question_id' => $d['id'],
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
