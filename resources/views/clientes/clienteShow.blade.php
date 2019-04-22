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
                            <td>{{ $persona->id }}</td>
                            <td>{{ $persona->nombre }}</td>
                            <td>{{ $persona->apellidoPaterno }}</td>
                            <td>{{ $persona->apellidoMaterno }}</td>
                            <td>{{ $persona->nombreUsuario }}</td>
                            <td>{{ $persona->telefono }}</td>
                            <td>{{ $persona->direccion }}</td>
                            <td>{{ $persona->email }}</td>
                            <td>
                                <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-sm btn-warning">
                                    Editar
                                </a>
                                <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST">
                                    <input type="hidden" name="_method" value="DELETE"> 
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">
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