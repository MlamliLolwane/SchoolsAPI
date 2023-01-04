<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSchoolRequest extends FormRequest
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
            'school_name' => 'regex:^[a-zA-Z]+$^',
            'email' => 'email|unique',
            'primary_phone_number' => 'min:10|max:10',
            'secondary_phone_number' => 'min:10|max:10',
            'physical_address' => 'string',
            'postal_address' => 'string'
        ];
    }
}
