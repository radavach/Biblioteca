@extends('layouts.app')

    @section('content')
        <h1>Bienvenido al sistema compañero trabajador!</h1>
        <p>
            Formulario de aplicaciones
        </p>

        <div>
            <table>
                <thead>
                    <tr>
                       <th></th> 
                    </tr>
                </thead>
                <tbody>
                    @foreach ($empleados as $empleado)
                        <tr>
                            <td>{{$empleado->nombre}}</td>
                            <td>{{$empleado->apellidoPaterno}}</td>
                            <td>{{$empleado->apellidoMaterno}}</td>
                            <td>{{$empleado->nombreEmpleado}}</td>
                            <td>{{$empleado->contrasena}}</td>
                            <td>{{$empleado->telefono}}</td>
                            <td>{{$empleado->direccion}}</td>
                            <td>{{$empleado->rfc}}</td>
                            <td>{{$empleado->correoElectronico}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endsection