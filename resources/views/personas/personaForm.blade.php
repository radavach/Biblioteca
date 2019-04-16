@extends('layouts.tabler')
@section('contenido')
<div class="page-header">
    <div class="page-title">
        AGREGAR PERSONA
    </div>
</div>
<div class="row">
    <div class="col-md-8 offset-2">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Capturar Persona</h3>
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

            @if(isset($persona))
                <form action="{{ route('personas.update', $persona->id) }}" method="POST">
                    <input type="hidden" name="_method" value="PATCH">
            @else
                <form action="{{ route('personas.store') }}" method="POST">
            @endif
                @csrf
                
                <div class="form-group">
                  <label class="form-label">Nombre</label>
                  <input type="text" class="form-control" name="nombre" value="{{ isset($persona) ? $persona->nombre : '' }}{{ old('nombre') }}" placeholder="Nombre de la persona">
                    @if ($errors->has('nombre'))
                        <span class="alert alert-danger">
                            <strong>{{ $errors->first('nombre') }}</strong>
                        </span>
                    @endif
                </div>

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
                  <label class="form-label">Bibliotecas</label>
                  <select name="biblioteca_id" class="form-control">
                    @foreach($bibliotecas as $biblioteca)
                        <option value="{{ $biblioteca->id }}" {{ isset($persona) && ($persona->biblioteca_id == $biblioteca->id) !== false ? 'selected' : ''}}>{{ $biblioteca->nombre }}</option>
                    @endforeach
                  </select>
                </div>

                <button type="submit" class="btn btn-primary ml-auto">Aceptar</button>

            </form>

          </div>
        </div>
    </div>
</div>

@endsection