<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'fname' => 'required | regex:/^[a-zA-Z]+$/',
            'mname' => 'required | regex:/^[a-zA-Z]+$/',
            'lname' => 'required | regex:/^[a-zA-Z]+$/',
            'gender' => 'required',
            'address' => 'required',
            'birthdate' => 'required',
            'contact' => 'required | regex:/^([0-9\s\-\+\(\)]*)$/|min:11|max:11',
            'time_in_am' => 'required',
            'time_out_am' => 'required',
            'time_in_pm' => 'required',
            'time_out_pm' => 'required',
            'sss' => 'required',
            'philhealth' => 'required | integer',
            'pagibig' => 'required | integer',
            'position' => 'required',
            'rate_per_day' => 'required  | integer',
            'image' => 'nullable | image | file | max:5000',
        ];
    }
}
