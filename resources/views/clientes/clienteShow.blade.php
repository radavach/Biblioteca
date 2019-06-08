@extends('layouts.tabler')
@section('contenido')

<div class="page-header">
    <div class="page-title">
        SHOW CLIENTE
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Bienvenido al sistema compañero trabajador!</h3>
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
                                    <i class="fe fe-edit-3"></i>                                    
                                    Editar
                                </a>
                                <form action="{{ route('bibliotecas.clientes.destroy', [$biblioteca_id, $cliente->id]) }}" method="POST">
                                    <input type="hidden" name="_method" value="DELETE"> 
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fe fe-trash-2"></i>                                    
                                        Borrar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection