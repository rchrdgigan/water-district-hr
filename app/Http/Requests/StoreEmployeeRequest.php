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
            'fname' => 'required',
            'mname' => 'required',
            'lname' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'birthdate' => 'required',
            'contact' => 'required',
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