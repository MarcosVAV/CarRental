@extends('adminlte::page')

@section('title', 'Clientes')

@section('content')
    <div class="container pt-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('rent-vehicles.index')}}">Veículos</a></li>
                <li class="breadcrumb-item active" aria-current="page">@if(isset($rentVehicle)) Editar @else Cadastrar @endif Aluguel</li>
            </ol>
        </nav>
    </div>
    @if (isset($rentVehicle))
        {!! Form::model($rentVehicle, ['route' => ['rent-vehicles.update', $rentVehicle->id], 'method' => 'PUT']) !!}
    @else
        {!! Form::open(['route' => 'rent-vehicles.store', 'method' => 'POST']) !!}
    @endif
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">@if(isset($rentVehicle)) Editar @else Cadastrar @endif Aluguel</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-6">
                                {!! Form::label('lCustormer', 'Cliente:', ['class' => 'control-label']) !!}
                                {!! Form::select('customer_id', $customers ?? [], null, ['class' => 'form-control', 'placeholder' => '- Selecione um Cliente...']) !!}
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                {!! Form::label('lVehicles', 'Veículos:', ['class' => 'control-label']) !!}
                                {!! Form::select('vehicle_id', $vehicleOptions ?? [], null, ['class' => 'form-control', 'placeholder' => '- Selecione um Veículo...']) !!}
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                {!! Form::label('lDateStart', 'Data de Início:', ['class' => 'control-label']) !!}
                                {{ Form::input('datetime-local','date_start', null, ['class'=>'form-control text-center']) }}
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                {!! Form::label('lDateStart', 'Data de Entrega:', ['class' => 'control-label']) !!}
                                {{ Form::input('datetime-local','date_end', null, ['class'=>'form-control text-center']) }}
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                {!! Form::label('lrentAmount', 'Valor:', ['class' => 'control-label']) !!}
                                {!! Form::number('rent_amount', null, ['class' => 'form-control', 'placeholder' => 'Valor do Aluguel']) !!}
                            </div>
                            <div class="form-group col-sm-12">
                                {!! Form::label('lDecription', 'Descrição:', ['class' => 'control-label']) !!}
                                {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Adicione informações pertinentes ao carro antes do aluguel', 'rows' => 3]) !!}
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
