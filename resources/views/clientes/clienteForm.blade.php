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
                  <label class="form-label">{{__('Nombre') }}</label>
                  <input type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : ''}}" name="nombre" value="{{ isset($cliente) ? $persona->nombre : old('nombre') }}" placeholder="Nombre de la persona">
                    @if ($errors->has('nombre'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('nombre') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                  <label class="form-label">{{__('Apellido Paterno') }}</label>
                  <input type="text" class="form-control{{ $errors->has('apellidoPaterno') ? ' is-invalid' : '' }}" name="apellidoPaterno" value="{{ isset($cliente) ? $persona->apellidoPaterno : old('apellidoPaterno') }}" placeholder="Apellido Paterno">
                    @if ($errors->has('apellidoPaterno'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('apellidoPaterno') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                  <label class="form-label">{{__('Apellido Materno') }}</label>
                  <input type="text" class="form-control{{ $errors->has('apellidoMaterno') ? ' is-invalid' : ''}}" name="apellidoMaterno" value="{{ isset($cliente) ? $persona->apellidoMaterno : old('apellidoMaterno') }}" placeholder="Apellido Materno">
                    @if ($errors->has('apellidoMaterno'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('apellidoMaterno') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                  <label class="form-label">{{__('Nombre de Usuario') }}</label>
                  <input type="text" class="form-control{{ $errors->has('nombreUsuario') ? ' is-invalid' : ''}}" name="nombreUsuario" value="{{ isset($cliente) ? $persona->nombreUsuario : old('nombreUsuario') }}" placeholder="Nombre de Usuario">
                    @if ($errors->has('nombreUsuario'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('nombreUsuario') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                  <label class="form-label">{{__('Teléfono')}}</label>
                  <input type="text" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : ''}}" name="telefono" value="{{ isset($cliente) ? $persona->telefono : old('telefono') }}" placeholder="Teléfono">
                    @if ($errors->has('telefono'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('telefono') }}</strong>
                      </span>
                    @endif
                </div>

                <div class="form-group">
                  <label class="form-label">{{__('Dirección')}}</label>
                  <input type="text" class="form-control{{ $errors->has('direccion') ? ' is-invalid' : ''}}" name="direccion" value="{{ isset($cliente) ? $persona->direccion : old('direccion') }}" placeholder="Dirección">
                    @if ($errors->has('direccion'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('direccion') }}</strong>
                      </span>
                    @endif
                </div>

                <div class="form-group">
                  <label class="form-label">{{__('Correo Electrónico')}}</label>
                  <input type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : ''}}" name="email" value="{{ isset($cliente) ? $persona->email : old('email') }}" placeholder="Correo Electrónico">
                    @if ($errors->has('email'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                    @endif
                </div>

                <div class="form-group">
                  <label class="form-label">{{__('Bibliotecas')}}</label>
                  <select name="biblioteca_id" class="form-control{{ $errors->has('biblioteca_id') ? ' is-invalid' : ''}}">
                      @foreach($bibliotecas as $biblioteca)
                         @if(!isset($biblio))
                          <option value="{{ $biblioteca->id }}" {{ isset($cliente) && ($persona->biblioteca_id == $biblioteca->id) !== false ? 'selected' : ''}}>{{ $biblioteca->nombre }}</option>
                       @elseif($biblioteca->id == $biblio)
                          <option value="{{ $biblioteca->id }}">{{ $biblioteca->nombre }}</option>
                        @endif 
                      @endforeach
                  </select>
                  @if ($errors->has('biblioteca_id'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('biblioteca_id') }}</strong>
                    </span>
                  @endif
                </div>

                <button type="submit" class="btn btn-primary ml-auto">Aceptar</button>
                <a href="{{ route('clientes.index') }}" class="btn btn-danger">Cancelar</a>
            </form>

          </div>
        </div>
    </div>
</div>

@endsection