@extends('adminlte::page')

@section('title', 'Clientes')

@section('content')
    <div class="container pt-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/customers">Clientes</a></li>
                <li class="breadcrumb-item active" aria-current="page">@if(isset($customer)) Editar @else Cadastrar @endif Cliente</li>
            </ol>
        </nav>
    </div>
    @if (isset($customer))
        {!! Form::model($customer, ['route' => ['customers.update', $customer->id], 'method' => 'PUT']) !!}
    @else
        {!! Form::open(['route' => 'customers.store']) !!}
    @endif
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">@if(isset($customer)) Editar @else Cadastrar @endif Cliente</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-12">
                                {!! Form::label('name', 'Nome:') !!}
                                {!! Form::text('name', $customer['name'] ?? null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                {!! Form::label('email', 'E-mail:') !!}
                                {!! Form::email('email', $customer['email'] ?? null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                {!! Form::label('phone', 'Telefone:') !!}
                                {!! Form::text('phone', $customer['phone'] ?? null, ['class' => 'form-control']) !!}
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
