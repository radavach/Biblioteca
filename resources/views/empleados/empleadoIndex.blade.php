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
                    <th>Nombre Empleado</th> 
                    <th>Contraseña</th> 
                    <th>Telefono</th> 
                    <th>Direccion</th> 
                    <th>RFC</th> 
                    <th>Correo Electronico</th> 
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($empleados as $empleado)
                    <tr>
                        <td>{{ $empleado->id }}</td>
                        <td>{{ $empleado->nombre }}</td>
                        <td>{{ $empleado->apellidoPaterno }}</td>
                        <td>{{ $empleado->apellidoMaterno }}</td>
                        <td>{{ $empleado->nombreEmpleado }}</td>
                        <td>{{ $empleado->contrasena }}</td>
                        <td>{{ $empleado->telefono }}</td>
                        <td>{{ $empleado->direccion }}</td>
                        <td>{{ $empleado->rfc }}</td>
                        <td>{{ $empleado->correoElectronico }}</td>
                        <td><a href="{{ route('empleados.show', $empleado->id) }}">Detalle</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
///<!--SOY ADORABLEEEEEEEEE!!!!-->