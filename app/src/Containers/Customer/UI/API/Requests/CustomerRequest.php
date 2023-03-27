<?php

namespace App\Containers\Customer\UI\API\Requests;

// use App\Ship\Abstracts\Requests\ApiRequest;
// use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firstname' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'phone' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'firstname.required' => 'A firstname is required',
            'surname.required' => 'A surname is required',
            'email.valid' => 'Email must be valid',
            'email.required' => 'An email is required',
            'phone.regex' => 'Phone must be valid',
            'phone.required' => 'A phone is required',
        ];
    }
}
