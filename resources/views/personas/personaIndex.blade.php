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
                @foreach ($personas as $persona)
                    <tr>
                        <td><a href="{{ route('personas.show', $persona->id) }}">{{ $persona->id }}</a></td>
                        <td>{{ $persona->nombre }}</td>
                        <td>{{ $persona->apellidoPaterno }}</td>
                        <td>{{ $persona->apellidoMaterno }}</td>
                        <td>{{ $persona->nombreUsuario }}</td>
                        <td>{{ $persona->telefono }}</td>
                        <td>{{ $persona->direccion }}</td>
                        <td>{{ $persona->email }}</td>
                        <td><a href="{{ route('personas.edit', $persona->id) }}" class = "btn btn-sm btn-warning">Editar</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection