@extends('layouts.tabler')
@section('contenido')
<div class="row">
    <div class="col-md-10 offset-1">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Detalle de Empleado</h3>
          </div>
          <div class="card-body">

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Telefono</th>
                        <!-- <th>Nombre</th>  -->
                        <!-- <th>Contraseña</th>  -->
                        <th>Direccion</th> 
                        <th>RFC</th> 
                        <th>Correo Electronico</th> 
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $empleado->id }}</td>
                        <td>{{ $empleado->nombre }} {{ $empleado->apellidoPaterno }} {{ $empleado->apellidoMaterno }}</td>
                        <td>{{ $empleado->telefono }}</td>
                        <td>{{ $empleado->direccion }}</td>
                        <td>{{ $empleado->rfc }}</td>
                        <td>{{ $empleado->correoElectronico }}</td>
                        <td>
                            <a href="{{ route('empleados.edit', $empleado->id) }}" class="btn btn-sm btn-warning">Editar</a>

                            <form action="{{ route('empleados.destroy', $empleado->id) }}" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger">Borrar</button>
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
