<?php

namespace App\Http\Controllers\Donation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Donation\ { BloodDonor, Question };
use App\Http\Requests\ { DonorStoreRequest, DonorUpdateRequest };

class DonorController extends Controller
{

    public function __construct()
    {
        $this->middleware('onlyAjax');
        $this->middleware('can:donor,search')->only(['searchDonor']);
        $this->middleware('can:donor,index')->only(['index']);
        $this->middleware('can:donor,show')->only(['show']);
        $this->middleware('can:donor,destroy')->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Http\Requests\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $blooddonor = BloodDonor::dataForPaginate();
        $blooddonor->each(function ($b) {
            $b->fullName = $b->name.' '.$b->last_name;
            $b->age = \Carbon\Carbon::parse($b->birthdate)->age;
        });
        return $this->dataWithPagination($blooddonor);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blooddonor = BloodDonor::findOrFail($id);
        $blooddonor->fullName = $blooddonor->name . ' ' . $blooddonor->last_name;
        if (request()->interview == 1) {
            $questions = Question::whereIn('sex', ['T', $blooddonor->sex])->get();
            return response()->json(compact('blooddonor', 'questions'));
        }
        return response()->json($blooddonor);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\DonorStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DonorStoreRequest $request)
    {
        $data = $request->validated();
        BloodDonor::create($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\DonorUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DonorUpdateRequest $request, $id)
    {
        $blooddonor = BloodDonor::findOrFail($id)->update($request->validated());
        return response()->json($blooddonor);
    }

    /**
     * Elimina el recurso especificado del almacenamiento.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blooddonor = BloodDonor::findOrFail($id)->delete();
        return response()->json($blooddonor);
    }
}