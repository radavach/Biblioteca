@extends('layouts.tabler')
@section('contenido')

<div class="page-header">
    <div class="page-title">
        INDEX CLIENTES
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Bienvenido al sistema compañero trabajador!</h3>
                <div class="ml-auto">
                    <form class="input-icon my-3 my-lg-0" action="{{ route('clientes.create') }}">
                        <button type="submit" class="btn ">Registrar Cliente</button>
                    </form>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-hover table-dark" >
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre Usuario</th> 
                            <th>Correo Electronico</th> 
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $cliente)
                            <tr>
                                <td><a href="{{ route('clientes.show', $cliente->id) }}">{{ $cliente->id }}</a></td>                        
                                <td>{{ $cliente->persona->nombreUsuario }}</td>
                                <td>{{ $cliente->persona->email }}</td>
                                <td><a href="{{ route('clientes.edit', $cliente->id) }}" class = "btn btn-sm btn-warning">Editar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection