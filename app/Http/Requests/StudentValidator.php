<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentValidator extends FormRequest
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
         'name' => 'required|alpha',
         'surname' => 'required|alpha',
         'school' => 'required|alpha',
         'class' => 'required|alpha_num|min:2|max:3'
        ];
    }
}
