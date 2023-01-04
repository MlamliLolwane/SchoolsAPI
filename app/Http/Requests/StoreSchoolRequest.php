<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSchoolRequest extends FormRequest
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
            'school_name' => 'required|regex:^[a-zA-Z]+$^',
            'email' => 'email|required',
            'primary_phone_number' => 'required|min:10|max:10',
            'secondary_phone_number' => 'required|min:10|max:10',
            'physical_address' => 'required',
            'postal_address' => 'required'
        ];
    }
}
