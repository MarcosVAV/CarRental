@extends('adminlte::page')

@section('title', 'Clientes')

@section('content')
    <div class="container pt-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/vehicles">Veículos</a></li>
                <li class="breadcrumb-item active" aria-current="page">@if(isset($vehicle)) Editar @else Cadastrar @endif Veículo</li>
            </ol>
        </nav>
    </div>
    @if (isset($vehicle))
        {!! Form::model($vehicle, ['route' => ['vehicles.update', $vehicle->id], 'method' => 'PUT']) !!}
    @else
        {!! Form::open(['route' => 'vehicles.store', 'method' => 'POST']) !!}
    @endif
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">@if(isset($vehicle)) Editar @else Cadastrar @endif Veículo</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-6">
                                {!! Form::label('model', 'Modelo:') !!}
                                {!! Form::text('model', $vehicle['model'] ?? null , ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                {!! Form::label('brand', 'Marca:') !!}
                                {!! Form::text('brand', $vehicle['brand'] ?? null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                {!! Form::label('year', 'Ano:') !!}
                                {!! Form::text('year', $vehicle['year'] ?? null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                {!! Form::label('vehicle_plate', 'Placa:') !!}
                                {!! Form::text('vehicle_plate', $vehicle['vehicle_plate'] ?? null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                {!! Form::label('color', 'Cor:') !!}
                                {!! Form::select('color', ['Vermelho', 'Verde', 'Prata', 'Preto', 'Branco', 'Azul'] , isset($vehicle) ? $vehicle['color'] : null,
                                    ['class' => 'form-control', 'placeholder' => '-Selecione uma Cor...']) !!}
                            </div>
                        </div>
                        <div class="form-group" style="text-align:end">
                            {!! Form::submit('salvar', ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
