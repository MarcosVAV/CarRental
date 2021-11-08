@extends('adminlte::page')

@section('title', 'Clientes')

@section('content')
    <div class="container pt-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/vehicles">Veículos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Criar ou Editar</li>
            </ol>
        </nav>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Criar ou Editar Veículo</h3>
                    </div>
                    <div class="card-body">
                        @if (isset($vehicle))
                            {!! Form::model($vehicle, ['route' => ['vehicles.update', $vehicle->id], 'method' => 'PUT']) !!}
                        @else
                            {!! Form::open(['route' => 'vehicles.store', 'method' => 'POST']) !!}
                        @endif
                        <div class="form-group">
                            {!! Form::label('model', 'Modelo:') !!}
                            {!! Form::text('model', isset($vehicle) ? $vehicle['model'] : null , ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('brand', 'Marca:') !!}
                            {!! Form::text('brand', isset($vehicle) ? $vehicle['brand'] : null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('year', 'Ano:') !!}
                            {!! Form::text('year', isset($vehicle) ? $vehicle['year'] : null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('vehicle_plate', 'Placa:') !!}
                            {!! Form::text('vehicle_plate', isset($vehicle) ? $vehicle['vehicle_plate'] : null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('color', 'Cor:') !!}
                            {!! Form::select('color', ['Vermelho', 'Verde', 'Prata', 'Preto', 'Branco', 'Azul'] , isset($vehicle) ? $vehicle['color'] : null, 
                                ['class' => 'form-control', 'placeholder' => 'Informe a Cor']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>                        
@endsection