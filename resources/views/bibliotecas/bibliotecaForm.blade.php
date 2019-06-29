@extends('layouts.tabler')
@section('contenido')
<div class="page-header">
    <div class="page-title">
        AGREGAR BIBLIOTECA
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Capturar Biblioteca</h3>
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

            @if(isset($biblioteca))
                <form action="{{ route('bibliotecas.update', $biblioteca->id) }}" method="POST">
                    <input type="hidden" name="_method" value="PATCH">
            @else
                <form action="{{ route('bibliotecas.store') }}" method="POST">
            @endif
                @csrf
                
                <div class="form-group">
                  <label class="form-label">{{__('Nombre')}}</label>
                  <input type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : ''}}" name="nombre" value="{{ isset($biblioteca) ? $biblioteca->nombre : old('nombre') }}" placeholder="Nombre de la biblioteca">
                    @if ($errors->has('nombre'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('nombre') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                  <label class="form-label">{{__('Apertura')}}</label>
                  <input type="time" class="form-control{{ $errors->has('horaApertura') ? ' is-invalid' : ''}}" name="horaApertura" value="{{ isset($biblioteca) ? $biblioteca->horaApertura : old('horaApertura') }}" placeholder="Hora de apertura">
                    @if ($errors->has('horaApertura'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('horaApertura') }}</strong>
                        </span>
                    @endif
                </div>
                
                <div class="form-group">
                  <label class="form-label">{{__('Cierre')}}</label>
                  <input type="time" class="form-control{{ $errors->has('horaCierre') ? ' is-invalid' : ''}}" name="horaCierre" value="{{ isset($biblioteca) ? $biblioteca->horaCierre : old('horaCierre') }}" placeholder="Hora de cierre">
                   @if ($errors->has('horaCierre'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('horaCierre') }}</strong>
                        </span>
                    @endif
                </div>
                
                <div class="form-group">
                  <label class="form-label">{{__('Días')}}</label>
                  <input type="date" class="form-control{{ $errors->has('dias') ? 'is-invalid' : ''}}" name="dias" value="{{ isset($biblioteca) ? $biblioteca->dias : old('dias') }}" placeholder="Días">
                    @if ($errors->has('dias'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('dias') }}</strong>
                        </span>
                    @endif
                </div>
                
                <div class="form-group">
                  <label class="form-label">{{__('Teléfono')}}</label>
                  <input type="text" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : ''}}" name="telefono" value="{{ isset($biblioteca) ? $biblioteca->telefono : old('telefono') }}" placeholder="Teléfono">
                   @if ($errors->has('telefono'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('telefono') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                  <label class="form-label">{{__('Página Web')}}</label>
                  <input type="text" class="form-control{{ $errors->has('paginaWeb') ? ' is-invalid' : ''}}" name="paginaWeb" value="{{ isset($biblioteca) ? $biblioteca->paginaWeb : old('paginaWeb') }}" placeholder="Página Web">
                    @if ($errors->has('paginaWeb'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('paginaWeb') }}</strong>
                        </span>
                    @endif
                </div>
                
                <div class="form-group">
                  <label class="form-label">{{__('Facebook')}}</label>
                  <input type="text" class="form-control{{ $errors->has('facebook') ? ' is-invalid' : ''}}" name="facebook" value="{{ isset($biblioteca) ? $biblioteca->facebook : old('facebook') }}" placeholder="Facebook">
                    @if ($errors->has('facebook'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('facebook') }}</strong>
                        </span>
                    @endif
                </div>
                
                <div class="form-group">
                  <label class="form-label">{{__('Correo Electrónico')}}</label>
                  <input type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : ''}}" name="email" value="{{ isset($biblioteca) ? $biblioteca->email : old('email') }}" placeholder="Correo Electrónico">
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary ml-auto">Aceptar</button>
                @if(isset($biblioteca_id) and (Gate::check('permisos_admin') || (\Auth::user()->$biblioteca_id == $biblioteca_id)))
                    <a href="{{ route('bibliotecas.bibliotecas.index', [$biblioteca_id]) }}" class="btn btn-danger">Cancelar</a>
                
                @else                
                    @can('permisos_admin')
                        <a href="{{ route('bibliotecas.index') }}" class="btn btn-danger">Cancelar</a>
                    @endcan
                @endif

            </form>

          </div>
        </div>
    </div>
</div>

@endsection