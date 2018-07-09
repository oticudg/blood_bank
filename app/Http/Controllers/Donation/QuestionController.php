<?php

namespace App\Http\Controllers\Donation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Donation\ { Question, BloodDonor, BloodDonorsQuestions };

class QuestionController extends Controller
{

    public function __construct()
    {
        $this->middleware('onlyAjax');
        $this->middleware('can:donor,index')->only(['index']);
        $this->middleware('can:donor,show')->only(['show']);
        $this->middleware('can:donor,store')->only(['store']);
        $this->middleware('can:donor,update')->only(['update']);
        $this->middleware('can:donor,destroy')->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $interviews = BloodDonorsQuestions::where('blood_donor_id', '=', $request->data)
        ->search(request()->search)
        ->groupBy(['interview', 'blood_donor_id'])
        ->select(['interview', 'blood_donor_id'])
        ->paginate(request()->num?:10);

        $interviews->each(function ($i) use ($request) {
            $i->id = $i->interview;
            $i->interview = 'Entrevista ' . $i->interview;
            $date = BloodDonorsQuestions::where('blood_donor_id', '=', $request->data)
            ->where('interview', '=', $i->id)
            ->first()->created_at;
            $i->year = $date->format('d/m/Y');
            $i->hour = $date->format('H:m:s');
            unset($i->blood_donor_id);
        });

        return $this->dataWithPagination($interviews);
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
        $interview = (BloodDonor::findOrFail($data['id'])->questions->max('interview') ?: 0) + 1;
        foreach ($data['questions'] as $d) {
            BloodDonorsQuestions::create([
                'answer' => $d['answer'],
                'blood_donor_id' => $data['id'],
                'interview' => $interview,
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
        $blooddonorsquestions = BloodDonorsQuestions::where('interview', '=', $id)
        ->where('blood_donor_id', '=', request()->donor)
        ->first();
        $blooddonorsquestions['name'] = 'Entrevista ' . $id;
        return response()->json($blooddonorsquestions);
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
        $data = $this->validate($request, ['questions' => 'required|array']);
        foreach ($data['questions'] as $d) {
            if ($d['answer'] == true) {
                $value = 1;
            } else {
                $value = 0;
            }
            BloodDonorsQuestions::where('blood_donor_id', '=', $id)->findOrFail($d['id'])->update(['answer' => $value]);
        }
    } 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blooddonorsquestions = BloodDonorsQuestions::where('interview', '=', $id)
        ->where('blood_donor_id', '=', request()->donor)
        ->get();
        foreach ($blooddonorsquestions as $b) {
            $b->delete();
        }
    }
}
