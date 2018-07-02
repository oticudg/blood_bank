<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DonorUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::user()->iCan('donor', 'update');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'last_name' => 'required',
            'num_id' => 'required|unique1:blood_donors',
            'email' => 'nullable|email',
            'birthdate' => 'required|date|year_min:1900',
            'sex' => 'required',
            'place_birthdate' => 'nullable|string',
            'blood_group' => 'nullable|max:3',
            'phone_person' => 'nullable|numeric',
            'location_home' => 'nullable|string',
            'phone_home' => 'nullable|numeric',
            'location_work' => 'nullable|string',
            'phone_work' => 'nullable|numeric',
            'profession' => '',
            'current_occupation' => '',
            'observation' => '',
        ];
    }

    /**
     * Cambio de nombres de los atributos.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'nombre',
            'last_name' => 'apellido',
            'num_id' => 'cédula',
            'email' => 'correo',
            'birthdate' => 'fecha',
            'sex' => 'sexo',
            'place_birthdate' => 'lugar de nacimiento',
            'blood_group' => 'grupo sanguineo',
            'phone_person' => 'telefono personal',
            'location_home' => 'lugar donde vive',
            'phone_home' => 'telefono de casa',
            'location_work' => 'lugar de trabajo ',
            'phone_work' => 'telefono de trabajo',
            'profession' => 'profesión',
            'current_occupation' => 'ocupación',
            'observation' => 'observación',
        ];
    }
}
