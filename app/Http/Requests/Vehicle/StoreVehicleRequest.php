<?php

namespace App\Http\Requests\Vehicle;

use Illuminate\Foundation\Http\FormRequest;

class StoreVehicleRequest extends FormRequest
{

    public function rules()
    {
        return [
            'model' => ['required', 'string', 'max:190'],
            'brand' => ['required', 'string', 'max:190'],
            'color' => ['required', 'string', 'max:190'],
            'year' => ['required', 'string', 'max:190'],
            'vehicle_plate' => ['required', 'string', 'max:190'],
        ];
    }
}
