@extends('layouts.app')
@section('content')
    <h1>Bienvenido al sistema compañero trabajador!</h1>
    <p>
        Formulario de aplicaciones
    </p>

    <div>
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
@endsection