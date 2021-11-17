<?php

use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Rent\RentVehicleController;
use App\Http\Controllers\Vehicle\VehicleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('\\')
    ->middleware('auth')
    ->group(function () {
        Route::resource('customers', CustomerController::class);
    });

Route::namespace('\\')
    ->middleware('auth')
    ->group(function () {
        Route::resource('vehicles', VehicleController::class);
    });

Route::namespace('\\')
    ->middleware('auth')
    ->group(function () {
        Route::resource('rent-vehicles', RentVehicleController::class);
    });
