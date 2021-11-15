<?php

namespace App\Http\Controllers\Rent;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\RentVehicle;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RentVehicleController extends Controller
{
    public function index()
    {
        $rentVehicles = RentVehicle::get()->map(function ($rentVehicle) {
            $vehicle = $rentVehicle->vehicle;

            $data = (object) [];
            $data->id = $rentVehicle->id;
            $data->customerName = $rentVehicle->customer->name;
            $data->vehicleName = "$vehicle->model - $vehicle->brand";
            $data->vehiclePlate = $vehicle->vehicle_plate;
            $data->dateStart = $rentVehicle->date_start;
            $data->dateEnd = $rentVehicle->date_end;

            return $data;
        });

        return view('Pages.Rent.index', compact('rentVehicles'));
    }

    public function create()
    {
        $customers = Customer::get()->pluck('name', 'id');

        $vehicles = Vehicle::get();

        foreach ($vehicles as $key => $vehicle) {
            $vehicleOptions[
                $vehicle->id
            ] = "$vehicle->brand-$vehicle->model Cor:$vehicle->color Placa:$vehicle->vehicle_plate";
        }

        return view('Pages.Rent.create-edit', compact('customers', 'vehicleOptions'));
    }

    public function store(Request $request)
    {
        RentVehicle::create($request->all());

        return redirect()
            ->route('rent-vehicles.index')
            ->with('success', 'Veículo Salvo!');
    }

    public function show(RentVehicle $rentVehicle)
    {
        //
    }

    public function edit(RentVehicle $rentVehicle)
    {
        $rentVehicle->customer_id = $rentVehicle->customer->id;
        $rentVehicle->date_start = Carbon::parse($rentVehicle->date_start)->toDateTimeLocalString();
        $rentVehicle->date_end = Carbon::parse($rentVehicle->date_end)->toDateTimeLocalString();

        $customers = Customer::get()->pluck('name', 'id');

        $vehicles = Vehicle::get();

        foreach ($vehicles as $key => $vehicle) {
            $vehicleOptions[
                $vehicle->id
            ] = "$vehicle->brand-$vehicle->model Cor:$vehicle->color Placa:$vehicle->vehicle_plate";
        }

        return view('Pages.Rent.create-edit', compact('customers', 'vehicleOptions', 'rentVehicle'));
    }

    public function update(Request $request, RentVehicle $rentVehicle)
    {
        $rentVehicle->update($request->all());

        return redirect()
            ->route('rent-vehicles.index')
            ->with('success', 'Veículo Salvo!');
    }

    public function destroy(RentVehicle $rentVehicle)
    {
        $rentVehicle->delete();

        return redirect()
            ->route('rent-vehicles.index')
            ->with('success', 'Veículo Deletado!');
    }
}