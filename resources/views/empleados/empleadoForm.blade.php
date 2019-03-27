@extends('layouts.tabler')
@section('contenido')
<div class="page-header">
    <div class="page-title">
        AGREGAR EMPLEADO
    </div>
</div>
<div class="row">
    <div class="col-md-8 offset-2">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Capturar Emplado</h3>
          </div>
          <div class="card-body">
            @if(isset($empleado))
                <form action="{{ route('empleados.update', $empleado->id) }}" method="POST">
                    <input type="hidden" name="_method" value="PATCH">
            @else
                <form action="{{ route('empleados.store') }}" method="POST">
            @endif
                @csrf

                <div class="form-group">
                  <label class="form-label">Nombre</label>
                  <input type="text" class="form-control" name="nombre" value="{{ isset($empleado) ? $empleado->nombre : '' }}" placeholder="Nombre">
                </div>

                <div class="form-group">
                  <label class="form-label">Apellido Paterno</label>
                  <input type="text" class="form-control" name="apellidoPaterno" value="{{ isset($empleado) ? $empleado->apellidoPaterno : '' }}" placeholder="Apellido Paterno">
                </div>

                <div class="form-group">
                  <label class="form-label">Apellido Materno</label>
                  <input type="text" class="form-control" name="apellidoMaterno" value="{{ isset($empleado) ? $empleado->apellidoMaterno : '' }}" placeholder="Apellido Materno">
                </div>

                <div class="form-group">
                  <label class="form-label">Contraseña</label>
                  <input type="password" class="form-control" name="contrasena" value="{{ isset($empleado) ? $empleado->contrasena : '' }}" placeholder="Contraseña">
                </div>

                <div class="form-group">
                  <label class="form-label">Teléfono</label>
                  <input type="text" class="form-control" name="telefono" value="{{ isset($empleado) ? $empleado->telefono : '' }}" placeholder="Teléfono">
                </div>

                <div class="form-group">
                  <label class="form-label">Direccion</label>
                  <input type="text" class="form-control" name="direccion" value="{{ isset($empleado) ? $empleado->direccion : '' }}" placeholder="Direccion">
                </div>

                <div class="form-group">
                  <label class="form-label">RFC</label>
                  <input type="text" class="form-control" name="rfc" value="{{ isset($empleado) ? $empleado->rfc : '' }}" placeholder="RFC">
                </div>

                <div class="form-group">
                  <label class="form-label">Correo Electronico</label>
                  <input type="text" class="form-control" name="correoElectronico" value="{{ isset($empleado) ? $empleado->correoElectronico : '' }}" placeholder="Correo Electronico">
                </div>

<!-- 
                <div class="form-group">
                  <label class="form-label">Clave</label>
                  <input type="text" class="form-control" name="clave" value="{{ $dependencia->clave ?? '' }}" placeholder="Clave de la dependencia">
                </div> -->

                <button type="submit" class="btn btn-primary ml-auto">Aceptar</button>

            </form>

          </div>
        </div>
    </div>
</div>

@endsection