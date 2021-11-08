<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:190'],
            'email' => ['required', 'string', 'max:190'],
            'phone' => ['required', 'string', 'max:190'],
        ];
    }
}
