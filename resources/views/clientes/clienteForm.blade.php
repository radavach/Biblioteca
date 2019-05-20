@extends('layouts.tabler')
@section('contenido')
<div class="page-header">
    <div class="page-title">
        AGREGAR CLIENTE
    </div>
</div>
<div class="row">
    <div class="col-md-10 offset-1">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Capturar Cliente</h3>
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

            @if(isset($cliente))
                <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
                    <input type="hidden" name="_method" value="PATCH">
            @else
                <form action="{{ route('clientes.store') }}" method="POST">
            @endif
                @csrf
                
                <div class="form-group">
                  <label class="form-label">Nombre</label>
                  <input type="text" class="form-control" name="nombre" value="{{ isset($cliente) ? $persona->nombre : '' }}{{ old('nombre') }}" placeholder="Nombre de la persona">
                    @if ($errors->has('nombre'))
                        <span class="alert alert-danger">
                            <strong>{{ $errors->first('nombre') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                  <label class="form-label">Apellido Paterno</label>
                  <input type="text" class="form-control" name="apellidoPaterno" value="{{ isset($cliente) ? $persona->apellidoPaterno : '' }}" placeholder="Apellido Paterno">
                </div>

                <div class="form-group">
                <label class="form-label">Apellido Materno</label>
                <input type="text" class="form-control" name="apellidoMaterno" value="{{ isset($cliente) ? $persona->apellidoMaterno : '' }}" placeholder="Apellido Materno">
                </div>

                <div class="form-group">
                <label class="form-label">Nombre de usuario</label>
                <input type="text" class="form-control" name="nombreUsuario" value="{{ isset($cliente) ? $persona->nombreUsuario : '' }}" placeholder="Nombre de Usuario">
                </div>

                <div class="form-group">
                  <label class="form-label">Teléfono</label>
                  <input type="text" class="form-control" name="telefono" value="{{ isset($cliente) ? $persona->telefono : '' }}" placeholder="Teléfono">
                </div>

                <div class="form-group">
                  <label class="form-label">Direccion</label>
                  <input type="text" class="form-control" name="direccion" value="{{ isset($cliente) ? $persona->direccion : '' }}" placeholder="Direccion">
                </div>

                <div class="form-group">
                  <label class="form-label">Correo Electronico</label>
                  <input type="text" class="form-control" name="email" value="{{ isset($cliente) ? $persona->email : '' }}" placeholder="Correo Electronico">
                </div>

                <div class="form-group">
                  <label class="form-label">Bibliotecas</label>
                  <select name="biblioteca_id" class="form-control">
                    @foreach($bibliotecas as $biblioteca)
                        <option value="{{ $biblioteca->id }}" {{ isset($cliente) && ($persona->biblioteca_id == $biblioteca->id) !== false ? 'selected' : ''}}>{{ $biblioteca->nombre }}</option>
                    @endforeach
                  </select>
                </div>

                <button type="submit" class="btn btn-primary ml-auto">Aceptar</button>
                <a href="{{ route('clientes.index') }}" class="btn btn-danger">Cancelar</a>
            </form>

          </div>
        </div>
    </div>
</div>

@endsection