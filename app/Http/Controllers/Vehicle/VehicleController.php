<?php

namespace App\Http\Controllers\Vehicle;

use App\Http\Controllers\Controller;
use App\Http\Requests\Vehicle\StoreVehicleRequest;
use App\Http\Requests\Vehicle\UpdateVehicleRequest;
use App\Models\Vehicle;

class VehicleController extends Controller
{

    public function index()
    {
        $vehicles = Vehicle::all();
        
        return view('Pages.Vehicle.index', compact('vehicles'));
    }

    public function create()
    {
        return view('Pages.Vehicle.create-edit');
    }

    public function store(StoreVehicleRequest $request)
    {
        Vehicle::create($request->validated());

        return redirect()->route('vehicles.index')->with('success', 'Veículo Salvo!');
    }

    public function edit(Vehicle $vehicle)
    {
        return view('Pages.Vehicle.create-edit', compact('vehicle'));
    }
  
    public function update(UpdateVehicleRequest $request, Vehicle $vehicle)
    {
        $vehicle->update($request->all());
        
        return redirect()->route('vehicles.index')->with('success', 'Veículo Atualizado!');
    }

    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        
        return redirect()->route('vehicles.index')->with('success', 'Veículo Excluido!');
    }
 
}