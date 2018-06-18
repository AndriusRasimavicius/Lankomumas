<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClubValidator extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
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
         'address' => 'required',
         'year' => 'required|digits:4',
         'quarter' => 'required|digits:1|lte:4'
        ];
    }
    public function messages()
{
    return [
        'name.required' => 'Lukelis Pavadinimas yra privalomas',
        'address.required' => 'Laukelis Adresas yra privalomas',
        'year.required' => 'Laukelis Metai yra privalomas',
        'year.digits' => 'Laukelis Metai turi buti sudarytas is 4 skaitmenu',
        'quarter.required' => 'Laukelis Ketvirtis yra privalomas',
        'quarter.digits' => 'Laukelis Ketvirtis turi buti skaicius nuo 1 iki 4',
        'quarter.lte' => 'Laukelis Ketvirtis turi buti skaicius nuo 1 iki 4'
    ];
}
}
