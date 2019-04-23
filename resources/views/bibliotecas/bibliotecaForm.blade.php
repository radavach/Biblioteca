@extends('layouts.tabler')
@section('contenido')
<div class="page-header">
    <div class="page-title">
        AGREGAR BIBLIOTECA
    </div>
</div>
<div class="row">
    <div class="col-md-8 offset-2">
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
                  <label class="form-label">Nombre</label>
                  <input type="text" class="form-control" name="nombre" value="{{ isset($biblioteca) ? $biblioteca->nombre : '' }}{{ old('nombre') }}" placeholder="Nombre de la biblioteca">
                    @if ($errors->has('biblioteca'))
                        <span class="alert alert-danger">
                            <strong>{{ $errors->first('biblioteca') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                  <label class="form-label">Apertura</label>
                  <input type="time" class="form-control" name="horaApertura" value="{{ $biblioteca->horaApertura ?? '' }}{{ old('horaApertura') }}" placeholder="Hora de apertura">
                </div>
                
                <div class="form-group">
                  <label class="form-label">Cierre</label>
                  <input type="time" class="form-control" name="horaCierre" value="{{ $biblioteca->horaCierre ?? '' }}{{ old('horaApertura') }}" placeholder="Hora de cierre">
                </div>
                
                <div class="form-group">
                  <label class="form-label">Dias</label>
                  <input type="date" class="form-control" name="dias" value="{{ $biblioteca->dias ?? '' }}{{ old('dias') }}" placeholder="Dias">
                </div>
                
                <div class="form-group">
                  <label class="form-label">telefono</label>
                  <input type="text" class="form-control" name="telefono" value="{{ $biblioteca->telefono ?? '' }}{{ old('telefono') }}" placeholder="Telefono">
                </div>

                <div class="form-group">
                  <label class="form-label">Pagina Web</label>
                  <input type="text" class="form-control" name="paginaWeb" value="{{ $biblioteca->paginaWeb ?? '' }}{{ old('paginaWeb') }}" placeholder="Pagina Web">
                </div>
                
                <div class="form-group">
                  <label class="form-label">Facebook</label>
                  <input type="text" class="form-control" name="facebook" value="{{ $biblioteca->facebook ?? '' }}{{ old('facebook') }}" placeholder="Facebook">
                </div>
                
                <div class="form-group">
                  <label class="form-label">Coreo Electronico</label>
                  <input type="text" class="form-control" name="email" value="{{ $biblioteca->email ?? '' }}{{ old('email') }}" placeholder="Email">
                </div>

                <button type="submit" class="btn btn-primary ml-auto">Aceptar</button>

            </form>

          </div>
        </div>
    </div>
</div>

@endsection