@extends('adminlte::page')

@section('title', 'Clientes')

@section('content')
    <div class="container pt-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a>Clientes</a></li>
            </ol>
        </nav>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="padding-top: 10px">Clientes</h3>
                        <div class="card-tools">
                            <a href="{{ route('customers.create') }}" class="btn btn-success" title="Adicionar novo Cliente">
                                <i class="fas fa-plus-circle"></i>
                                Adicionar
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">Código</th>
                                    <th>Nome</th>
                                    <th class="text-center">Cpf</th>
                                    <th>E-mail</th>
                                    <th class="text-center">Telefone</th>
                                    <th class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                    <tr>
                                        <td class="text-center">{{ $customer->id }}</td>
                                        <td>{{ $customer->name }}</td>
                                        <td class="text-center">{{ $customer->cpf }}</td>
                                        <td>{{ $customer->email }}</td>
                                        <td class="text-center">{{ $customer->phone }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-info">
                                                <i class="fas fa-pencil-alt"></i>
                                                Editar
                                            </a>
                                            <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                    Deletar
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
