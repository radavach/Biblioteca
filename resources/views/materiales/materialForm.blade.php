@extends('layouts.tabler')
@section('contenido')
<div class="page-header">
    <div class="page-title">
        AGREGAR MATERIAL
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-10 ">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Capturar Material</h3>
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

                @if(!isset($iblioteca_id))
                    @if(isset($material))
                        <form action="{{ route('materiales.update', $material->id) }}" method="POST">
                            <input type="hidden" name="_method" value="PATCH">
                    @else
                        <form action="{{ route('materiales.store') }}" method="POST">
                    @endif
                @else
                    @if(isset($material))
                        <form action="{{ route('biblioteca.materiales.update', [$biblioteca_id, $material->id]) }}" method="POST">
                            <input type="hidden" name="_method" value="PATCH">
                    @else
                        <form action="{{ route('biblioteca.materiales.store', $iblioteca_id) }}" method="POST">
                    @endif
                @endif
                
                    @csrf
                    
                    <div class="form-group">
                        <label class="form-label">{{ __('Identificador del Artículo') }}</label>
                        <input type="text" class="form-control{{ $errors->has('idArticulo') ? ' is-invalid' : '' }}" name="idArticulo" value="{{ isset($material) ? $material->idArticulo : old('idArticulo') }}" placeholder="Id Artículo">
                        @if ($errors->has('idArticulo'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('idArticulo') }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="form-group">
                        <label class="form-label">{{ __('Nombre') }}</label>
                        <input type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ isset($material) ? $material->nombre : old('nombre') }}" placeholder="Nombre del material">
                        @if ($errors->has('nombre'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('nombre') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="form-label">{{ __('Sección') }}</label>
                        <input type="text" class="form-control{{ $errors->has('seccion') ? ' is-invalid' : '' }}" name="seccion" value="{{ isset($material) ? $material->seccion : old('seccion') }}" placeholder="Sección del material">
                        @if ($errors->has('seccion'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('seccion') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="form-label">{{ __('Tipo') }}</label>
                        <input type="text" class="form-control{{ $errors->has('tipo') ? ' is-invalid' : '' }}" name="tipo" value="{{ isset($material) ? $material->tipo : old('tipo') }}" placeholder="Tipo de material">
                        @if ($errors->has('tipo'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('tipo') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="form-label">{{ __('Ejemplar') }}</label>
                        <input type="text" class="form-control{{ $errors->has('ejemplar') ? ' is-invalid' : '' }}" name="ejemplar" value="{{ isset($material) ? $material->ejemplar : old('ejemplar') }}" placeholder="Número de ejemplar">
                        @if ($errors->has('ejemplar'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('ejemplar') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="form-label">{{ __('Link Imagen') }}</label>
                        <input type="text" class="form-control{{ $errors->has('linkImagen') ? ' is-invalid' : '' }}" name="linkImagen" value="{{ isset($material) ? $material->linkImagen : old('ejemplar') }}" placeholder="El link de la imagen">
                        @if ($errors->has('linkImagen'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('linkImagen') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="form-label">{{ __('Autor') }}</label>
                        <input type="text" class="form-control{{ $errors->has('autor') ? ' is-invalid' : '' }}" name="autor" value="{{ isset($material) ? $material->autor : old('autor') }}" placeholder="Autor">
                        @if ($errors->has('autor'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('autor') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="form-label">{{ __('Año') }}</label>
                        <input type="text" class="form-control{{ $errors->has('anio') ? ' is-invalid' : '' }}" name="anio" value="{{ isset($material) ? $material->anio : old('anio') }}" placeholder="Año de creación ">
                        @if ($errors->has('anio'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('anio') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="form-label">{{ __('Bibliotecas') }}</label>
                        <select name="biblioteca_id" class="form-control{{ $errors->has('biblioteca_id') ? ' is-invalid' : '' }}">
                            @foreach($bibliotecas as $biblioteca)
                                @if(!isset($biblioteca_id))
                                    <option value="{{ $biblioteca->id }}">{{ $biblioteca->nombre }}</option>
                                @elseif($biblioteca_id == $biblioteca->id)
                                    <option value="{{ $biblioteca->id }}" {{ isset($material) && ($material->biblioteca_id == $biblioteca->id) !== false ? 'selected' : ''}}>{{ $biblioteca->nombre }}</option>
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
                    @can('permisos_admin')
                        <a href="{{ route('materiales.index') }}" class="btn btn-danger">Cancelar</a>
                    @else
                        <a href="{{ route('bibliotecas.materiales.index', [\Auth::user()->biblioteca_id]) }}" class="btn btn-danger">Cancelar</a>
                    @endcan

                </form>

            </div>
        </div>
    </div>
</div>

@endsection