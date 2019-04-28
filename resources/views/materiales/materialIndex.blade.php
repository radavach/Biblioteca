@extends('layouts.tabler')
@section('contenido')
<div class="page-header">
    <div class="page-title">
        AGREGAR MATERIAL
    </div>
</div>
<div class="row">
    <div class="col-md-10 offset-1">
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

                @if(isset($material))
                    <form action="{{ route('materiales.update', $material->id) }}" method="POST">
                        <input type="hidden" name="_method" value="PATCH">
                @else
                    <form action="{{ route('material.store') }}" method="POST">
                @endif
                    @csrf
                    
                    <div class="form-group">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="titulo" value="{{ isset($libro) ? $libro->titulo : '' }}{{ old('titulo') }}" placeholder="Titulo del libro">
                            @if ($errors->has('titulo'))
                                <span class="alert alert-danger">
                                    <strong>{{ $errors->first('titulo') }}</strong>
                                </span>
                            @endif
                    </div>

                    <div class="form-group">
                        <label class="form-label">Seccion</label>
                        <input type="text" class="form-control" name="subtitulo" value="{{ isset($libro) ? $libro->subtitulo : '' }}" placeholder="Subtitulo del libro">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Tipo</label>
                        <input type="text" class="form-control" name="isbn" value="{{ isset($libro) ? $libro->isbn : '' }}" placeholder="ISBN del libro">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Ejemplar</label>
                        <input type="text" class="form-control" name="autor" value="{{ isset($libro) ? $libro->autor : '' }}" placeholder="Autor del libro">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Link Imagen</label>
                        <input type="text" class="form-control" name="editorial" value="{{ isset($libro) ? $libro->editorial : '' }}" placeholder="Editorial del libro">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Autor</label>
                        <input type="text" class="form-control" name="anio" value="{{ isset($libro) ? $libro->anio : '' }}" placeholder="Año del libro">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Año</label>
                        <input type="text" class="form-control" name="genero" value="{{ isset($libro) ? $libro->genero : '' }}" placeholder="Genero del libro">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Bibliotecas</label>
                        <select name="biblioteca_id" class="form-control">
                            @foreach($bibliotecas as $biblioteca)
                                <option value="{{ $biblioteca->id }}" {{ isset($libro) && ($libro->biblioteca_id == $biblioteca->id) !== false ? 'selected' : ''}}>{{ $biblioteca->nombre }}</option>
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