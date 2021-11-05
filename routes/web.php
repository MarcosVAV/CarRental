<?php

use App\Http\Controllers\Car\Cars;
use App\Http\Controllers\Customer\Customers;
use App\Http\Controllers\Rent\RentCars;
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
        Route::resource('customers', Customers::class);
    });

Route::namespace('\\')
    ->middleware('auth')
    ->group(function () {
        Route::resource('cars', Cars::class);
    });

Route::namespace('\\')
    ->middleware('auth')
    ->group(function () {
        Route::resource('rent-cars', RentCars::class);
    });