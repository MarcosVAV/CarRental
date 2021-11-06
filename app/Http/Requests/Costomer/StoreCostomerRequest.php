<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:190'],
            'email' => ['nullable', 'string', 'max:190'],
            'phone' => ['nullable', 'string', 'max:190'],
        ];
    }
}
