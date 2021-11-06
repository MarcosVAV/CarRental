<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCostumerRequest extends FormRequest
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
