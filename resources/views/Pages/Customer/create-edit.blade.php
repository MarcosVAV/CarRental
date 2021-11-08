@extends('adminlte::page')

@section('title', 'Clientes')

@section('content')
    <div class="container pt-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/customers">Clientes</a></li>
                <li class="breadcrumb-item active" aria-current="page">Criar ou Editar</li>
            </ol>
        </nav>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Criar ou Editar Cliente</h3>
                    </div>
                    <div class="card-body">
                        @if (isset($customer))
                            {!! Form::model($customer, ['route' => ['customers.update', $customer->id], 'method' => 'PUT']) !!}
                        @else
                            {!! Form::open(['route' => 'customers.store']) !!}
                        @endif
                        <div class="form-group">
                            {!! Form::label('name', 'Nome:') !!}
                            {!! Form::text('name', isset($customer) ? $customer['name'] : null , ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('email', 'E-mail:') !!}
                            {!! Form::email('email', isset($customer) ? $customer['email'] : null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('phone', 'Telefone:') !!}
                            {!! Form::text('phone', isset($customer) ? $customer['phone'] : null, ['class' => 'form-control']) !!}
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