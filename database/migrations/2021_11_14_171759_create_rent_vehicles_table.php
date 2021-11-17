<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentVehiclesTable extends Migration
{
    public function up()
    {
        Schema::create('rent_vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('description')->nullable();
            $table->dateTime('date_start');
            $table->dateTime('date_end');
            $table->decimal('rent_amount', 8, 2);
            $table->foreignId('vehicle_id')->constrained();
            $table->foreignId('customer_id')->constrained();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rent_vehicles');
    }
}