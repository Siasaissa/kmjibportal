<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInsuranceQuotationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            // All your validation rules from the controller
        ];
    }

    public function messages()
    {
        return [
            'required-field' => 'This field is required',
            // Custom error messages
        ];
    }
}