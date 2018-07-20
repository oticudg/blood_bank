<?php

namespace App\Http\Controllers\Donation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Donation\ { BloodDonor, Question, BloodGroup, BloodDonorsQuestions, TypeDonation, Donation };

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->data) {
            $donation = Donation::orderBy(request()->order?:'id', request()->dir?:'DESC')
            ->where('blood_donor_id', '=', request()->data)
            ->search(request()->search)
            ->select(['id', 'observation', 'recorder_id', 'serial', 'type_donation_id', 'blood_donor_id', 'created_at'])
            ->paginate(request()->num?:10);

            $donation->each(function ($d) {
                $d->donation = 'Donación ' . $d->id;
                $date = $d->created_at;
                $d->year = $date->format('d/m/Y');
                $d->hour = $date->format('h:i:s A');
                $donor_name = $d->blood_donor->fullName();
                $type_donation = $d->type_donation->name;
                unset($d->blood_donor,$d->type_donation);
                $d->type_donation = $type_donation;
                $d->blood_donor = $donor_name;
            });

            return $this->dataWithPagination($donation);
        } else {}
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
            'questions' => 'required|array',
            'donation.blood_donor_id' => 'required|numeric',
            'donation.blood_group_id' => 'nullable',
            'donation.serial' => 'required|string|min:3|max:10',
            'donation.weight' => 'required|numeric|min:0|max:200',
            'donation.pulse' => 'required|min:0|max:20|max:220',
            'donation.blood_pressure' => 'required|min:7|max:10',
            'donation.temperature' => 'required|numeric|min:36|max:38',
            'donation.height' => 'required|numeric|min:100|max:230',
            'donation.type_donation_id' => 'required',
        ], [], [
            'donation.blood_donor_id' => 'donante',
            'donation.blood_group_id' => 'tipeaje',
            'donation.serial' => 'serial',
            'donation.weight' => 'peso',
            'donation.pulse' => 'pulso',
            'donation.blood_pressure' => 'presión arterial',
            'donation.temperature' => 'temperatura',
            'donation.height' => 'estatura',
            'donation.type_donation_id' => 'tipo de donación',
        ]);

        $data['donation']['recorder_id'] = \Auth::user()->id;
        $donation = Donation::create($data['donation']);
        foreach ($data['questions'] as $d) {
            BloodDonorsQuestions::create([
                'answer' => $d['answer'],
                'blood_donor_id' => $data['id'],
                'donation_id' => $donation->id,
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
        $donation = Donation::findOrFail($id);
        $donation->name = 'Donación ' . $donation->id;
        return response()->json($donation);
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
        $data = $this->validate($request, [
            'questions' => 'required|array',
            'donation.blood_donor_id' => 'required|numeric',
            'donation.serial' => 'required|string|min:3|max:10',
            'donation.weight' => 'required|numeric|min:0|max:200',
            'donation.pulse' => 'required|min:0|max:20|max:220',
            'donation.blood_pressure' => 'required|min:7|max:10',
            'donation.temperature' => 'required|numeric|min:36|max:38',
            'donation.height' => 'required|numeric|min:100|max:230',
            'donation.type_donation_id' => 'required',
        ], [], [
            'donation.blood_donor_id' => 'donante',
            'donation.serial' => 'serial',
            'donation.weight' => 'peso',
            'donation.pulse' => 'pulso',
            'donation.blood_pressure' => 'presión arterial',
            'donation.temperature' => 'temperatura',
            'donation.height' => 'estatura',
            'donation.type_donation_id' => 'tipo de donación',
        ]);

        $donation = Donation::findOrFail($id)->update($data['donation']);
        foreach ($data['questions'] as $d) {
            BloodDonorsQuestions::findOrFail($d['id'])->update(['answer' => $d['answer']]);
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
        $donation = Donation::findOrFail($id)->delete();
        return response()->json($donation);
    }

    /**
     * Retorna los datos que se usaran para crear y editar.
     *
     * @return \Illuminate\Http\Response
     */
    public function dataForRegister($donor_id, $donation_id = null)
    {
        $bloodgroup = BloodGroup::get(['id', 'name']);
        $typedonation = TypeDonation::get(['id', 'name']);
        $blooddonor = BloodDonor::findOrFail($donor_id);
        $blooddonor->fullName = $blooddonor->fullName();
        if ($donation_id) {
            $donation = Donation::findOrFail($donation_id);
            $questions = BloodDonorsQuestions::where('donation_id', '=', $donation_id)->get();
            $questions->each(function ($q) {
                $value = $q->question->question;
                unset($q->question);
                $q->question = $value;
            });
        } else {
            $questions = Question::whereIn('sex', ['T', $blooddonor->sex])->get();
        }
        return response()->json(compact('bloodgroup', 'blooddonor', 'questions', 'typedonation', 'donation'));
    }
}