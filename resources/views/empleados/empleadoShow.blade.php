@extends('layouts.tabler')
@section('contenido')

<div class="page-header">
    <div class="page-title">
        SHOW EMPLEADO
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
                            <th>Nombre Usuario</th> 
                            <th>Telefono</th> 
                            <th>Direccion</th> 
                            <th>Correo Electronico</th> 
                            <th>RFC</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $empleado->id }}</td>
                            <td>{{ $persona->nombre }} {{ $persona->apellidoPaterno }} {{ $persona->apellidoMaterno }}</td>
                            <td>{{ $persona->nombreUsuario }}</td>
                            <td>{{ $persona->telefono }}</td>
                            <td>{{ $persona->direccion }}</td>
                            <td>{{ $persona->email }}</td>
                            <td>{{ $empleado->rfc }}</td>
                            <td>
                                <a href="{{ route('empleados.edit', $empleado->id) }}" class="btn btn-sm btn-warning">
                                    Editar
                                </a>
                                <form action="{{ route('empleados.destroy', $empleado->id) }}" method="POST">
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