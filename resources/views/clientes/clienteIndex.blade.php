@extends('layouts.app')
@section('content')
    <h1>Bienvenido al sistema compañero trabajador!</h1>
    <p>
        Formulario de aplicaciones
    </p>

    <div>
        <table class="table table-hover table-dark" border = "1">
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
                @foreach ($clientes as $cliente)
                    <tr>
                        <td><a href="{{ route('clientes.show', $cliente->id) }}">{{ $cliente->id }}</a></td>
                        <td>{{ $cliente->persona->nombre }}</td>
                        <td>{{ $cliente->persona->apellidoPaterno }}</td>
                        <td>{{ $cliente->persona->apellidoMaterno }}</td>
                        <td>{{ $cliente->persona->nombreUsuario }}</td>
                        <td>{{ $cliente->persona->telefono }}</td>
                        <td>{{ $cliente->persona->direccion }}</td>
                        <td>{{ $cliente->persona->email }}</td>
                        <td><a href="{{ route('clientes.edit', $cliente->id) }}" class = "btn btn-sm btn-warning">Editar</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection