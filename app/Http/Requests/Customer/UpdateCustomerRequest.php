<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:190'],
            'email' => ['nullable', 'string', 'max:190'],
            'phone' => ['required', 'string', 'max:190'],
            'cpf' => ['required', 'string', 'max:190'],
            'address' => ['required', 'string', 'max:190'],
            'neighborhood' => ['required', 'string', 'max:190'],
            'address_number' => ['required', 'string', 'max:190'],
            'city' => ['required', 'string', 'max:190'],
            'state' => ['required', 'string', 'max:190'],
            'country' => ['required', 'string', 'max:190'],
            'complement' => ['nullable', 'string', 'max:190'],
            'marital_status' => ['nullable', 'string', 'max:190'],
            'profession' => ['nullable', 'string', 'max:190'],
        ];
    }
}
