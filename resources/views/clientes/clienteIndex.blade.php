@extends('layouts.tabler')
@section('contenido')

<div class="page-header">
    <div class="page-title">
        INDEX CLIENTE
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Bienvenido al sistema compañero trabajador!</h3>
                
                <div class="ml-auto">
                    <form class="input-icon my-3 my-lg-0" action="{{ route('bibliotecas.clientes.create', $biblioteca_id) }}" method="GET">
                        <button type="submit" class="btn btn-primary">Registrar Cliente</button>
                    </form>
                </div>
                
                <div class="ml-auto">
                    <form class="input-icon my-3 my-lg-0" action="{{ route('bibliotecas.clientes.adeudos', $biblioteca_id) }}" method="GET">
                        <button type="submit" class="btn btn-primary">Clientes con pendientes</button>
                    </form>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-hover table-dark" >

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th> 
                            <th colspan="2">Apellido</th> 
                            <th>Nombre Usuario</th> 
                            <th>Telefono</th> 
                            <th>Direccion</th> 
                            <th>Correo Electronico</th> 
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clientes as $cliente)
                            <tr>
                                <td>{{ $cliente->id }}</td>
                                <td>{{ $cliente->nombre }}</td>
                                <td>{{ $cliente->apellidoPaterno }}</td>
                                <td>{{ $cliente->apellidoMaterno }}</td>
                                <td>{{ $cliente->nombreUsuario }}</td>
                                <td>{{ $cliente->telefono }}</td>
                                <td>{{ $cliente->direccion }}</td>
                                <td>{{ $cliente->email }}</td>
                                <td>
                                    <a href="{{ route('bibliotecas.clientes.edit', [$biblioteca_id, $cliente->id]) }}" class="btn btn-sm btn-warning">
                                        Editar
                                    </a>
                                    <form action="{{ route('bibliotecas.clientes.destroy', [$biblioteca_id, $cliente->id]) }}" method="POST">
                                        <input type="hidden" name="_method" value="DELETE"> 
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            Borrar
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
@endsection