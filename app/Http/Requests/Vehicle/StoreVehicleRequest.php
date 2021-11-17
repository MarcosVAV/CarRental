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
            'total_value' => ['required', 'string', 'max:190'],
        ];
    }

    public function attributes()
    {
        return [
            'model' => 'modelo',
            'brand' => 'marca',
            'color' => 'cor',
            'year' => 'ano',
            'vehicle_plate' => 'placa',
            'total_value' => 'valor total',
        ];
    }
}
