@extends('layouts.tabler')
@section('contenido')

<div class="page-header">
    <div class="page-title">
        INDEX EMPLEADOS
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
                            <th>Nombre Usuario</th> 
                            <th>Correo Electronico</th> 
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($empleados as $empleado)
                            <tr>
                                <td><a href="{{ route('empleados.show', $empleado->id) }}">{{ $empleado->id }}</a></td>
                                <td>{{ $empleado->persona->nombreUsuario }}</td>
                                <td>{{ $empleado->persona->email }}</td>
                                <td><a href="{{ route('empleados.edit', $empleado->id) }}" class="btn btn-sm btn-warning">Editar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
