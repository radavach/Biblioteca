@extends('layouts.tabler')
@section('contenido')
<div class="page-header">
    <div class="page-title">
        AGREGAR EMPLEADO
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-10 ">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Capturar Empleado</h3>
          </div>
          <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            @if(isset($personas))
              @if(isset($empleado))
                <form action="{{ route('empleados.redireccionarEmp', $empleado->id) }}" method="GET">
              @else
                <form action="{{ route('empleados.redireccionar') }}" method="GET">
              @endif
                @csrf

                <div class="form-group">
                  <label class="form-label">Persona a la que esta asignado</label>
                  <select name="persona_id" class="form-control">
                    @foreach($personas as $person)
                    <option value="{{ $person->id }}" {{ isset($persona) && ($persona->id == $person->id) !== false ? 'selected' : ''}}>
                      {{ $person->id }} - {{ $person->nombre }}
                    </option>
                    @endforeach
                  </select>
                </div>
                
                <button type="submit" class="btn btn-primary ml-auto">Seleccionar</button>
            @endif
                
                @if ($errors->has('empleado_id'))
                  <br>
                  <br>
                  <span class="alert alert-danger">
                      <strong>Es necesario seleccionar un usuario</strong>
                  </span>
                  <br>
                  <br>
                @endif
            </form>

       
            @if(isset($empleado))
                <form action="{{ route('empleados.update', $empleado->id) }}" method="POST">
                    <input type="hidden" name="_method" value="PATCH">
            @elseif(isset($personas))
                <form action="{{ route('empleados.store') }}" method="POST">
            @endif
                @csrf

                <div class="form-group">
                  <label class="form-label">Nombre</label>
                  <input type="text" class="form-control" name="nombre" value="{{ isset($persona) ? $persona->nombre : '' }}" placeholder="Nombre de la persona">
                  @if ($errors->has('nombre'))
                      <span class="alert alert-danger">
                          <strong>{{ $errors->first('nombre') }}</strong>
                      </span>
                  @endif
                </div>

                <input type="hidden" name="persona_id" value="{{ isset($persona) ? $persona->id : ''}}">

                <div class="form-group">
                  <label class="form-label">Apellido Paterno</label>
                  <input type="text" class="form-control" name="apellidoPaterno" value="{{ isset($persona) ? $persona->apellidoPaterno : '' }}" placeholder="Apellido Paterno">
                </div>

                <div class="form-group">
                <label class="form-label">Apellido Materno</label>
                <input type="text" class="form-control" name="apellidoMaterno" value="{{ isset($persona) ? $persona->apellidoMaterno : '' }}" placeholder="Apellido Materno">
                </div>

                <div class="form-group">
                <label class="form-label">Nombre de usuario</label>
                <input type="text" class="form-control" name="nombreUsuario" value="{{ isset($persona) ? $persona->nombreUsuario : '' }}" placeholder="Nombre de Usuario">
                </div>

                <div class="form-group">
                <label class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="contrasena" value="{{ isset($empleado) ? $empleado->contrasena : '' }}" placeholder="Password">
                </div>

                <div class="form-group">
                  <label class="form-label">Teléfono</label>
                  <input type="text" class="form-control" name="telefono" value="{{ isset($persona) ? $persona->telefono : '' }}" placeholder="Teléfono">
                </div>

                <div class="form-group">
                  <label class="form-label">Direccion</label>
                  <input type="text" class="form-control" name="direccion" value="{{ isset($persona) ? $persona->direccion : '' }}" placeholder="Direccion">
                </div>

                <div class="form-group">
                  <label class="form-label">Correo Electronico</label>
                  <input type="text" class="form-control" name="email" value="{{ isset($persona) ? $persona->email : '' }}" placeholder="Correo Electronico">
                </div>

                <div class="form-group">
                  <label class="form-label">RFC</label>
                  <input type="text" class="form-control" name="rfc" value="{{ isset($empleado) ? $empleado->rfc : '' }}" placeholder="RFC">
                </div>

                <div class="form-group">
                  <label class="form-label">Bibliotecas</label>
                  <select name="biblioteca_id" class="form-control">
                    @foreach($bibliotecas as $biblioteca)
                        <option value="{{ $biblioteca->id }}" {{ isset($persona) && ($persona->biblioteca_id == $biblioteca->id) !== false ? 'selected' : ''}}>{{ $biblioteca->nombre }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label class="form-label">Es administrador</label>
                  <input type="radio" name="esAdmin" value="TRUE" {{ (isset($empleado) && ($empleado->esAdmin == '1')) ? 'checked' : '' }}> SI <br>
                  <input type="radio" name="esAdmin" value="FALSE" {{ (isset($empleado) && ($empleado->esAdmin == '0')) ? 'checked' : '' }}> NO 
                </div>

                <button type="submit" class="btn btn-primary ml-auto">Aceptar</button>

            </form>

          </div>
        </div>
    </div>
</div>

@endsection
