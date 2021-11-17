@extends('adminlte::page')

@section('Tittle', 'Aluguéis de Veículos')

@section('content')
    <div class="container pt-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href=" {{route('home')}} ">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a>Aluguéis de Veículos</a></li>
            </ol>
        </nav>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="padding-top: 10px">Aluguéis de Veículos</h3>
                        <div class="card-tools">
                            <a href="{{ route('rent-vehicles.create') }}" class="btn btn-success" title="Adicionar novo veículo">
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
                                    <th class="text-center">Cliente</th>
                                    <th class="text-center">Carro</th>
                                    <th class="text-center">Placa</th>
                                    <th class="text-center">Data Início</th>
                                    <th class="text-center">Data Entrega</th>
                                    <th class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rentVehicles as $rentVehicle)
                                    <tr>
                                        <td class="text-center">{{ $rentVehicle->id }}</td>
                                        <td class="text-center">{{ $rentVehicle->customerName }}</td>
                                        <td class="text-center">{{ $rentVehicle->vehicleName }}</td>
                                        <td class="text-center">{{ $rentVehicle->vehiclePlate }}</td>
                                        <td class="text-center">{{ $rentVehicle->dateStart }}</td>
                                        <td class="text-center">{{ $rentVehicle->dateEnd }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('rent-vehicles.edit', $rentVehicle->id) }}" class="btn btn-info">
                                                <i class="fas fa-edit"></i>
                                                Editar
                                            </a>
                                            <form action="{{ route('rent-vehicles.destroy', $rentVehicle->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fas fa-trash-alt"></i>
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


