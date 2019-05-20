@extends('layouts.tabler')
@section('contenido')
@php if(!isset($_SESSION)){session_start();} @endphp
<div class="page-header">
    <div class="page-title">
        AGREGAR LIBRO
    </div>
</div>
<div class="row">
    <div class="col-md-10 offset-1">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Capturar Libro</h3>
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

                @if(!isset($biblio))

                    @if(isset($libro))
                        <form action="{{ route('libros.update', $libro->id) }}" method="POST">
                            <input type="hidden" name="_method" value="PATCH">
                    @else
                        <form action="{{ route('libros.store') }}" method="POST">
                    @endif
                    
                @else

                    @if(isset($libro))
                        <form action="{{ route('bibliotecas.librosB.update', [$biblio, $libro->id]) }}" method="POST">
                            <input type="hidden" name="_method" value="PATCH">
                    @else
                        <form action="{{ route('bibliotecas.librosB.store', $biblio) }}" method="POST">
                    @endif

                @endif

                    @csrf
                    
                    <div class="form-group">
                        <label class="form-label">Titulo</label>
                        <input type="text" class="form-control" name="titulo" value="{{ isset($libro) ? $libro->titulo : '' }}{{ old('titulo') }}" placeholder="Titulo del libro">
                            @if ($errors->has('titulo'))
                                <span class="alert alert-danger">
                                    <strong>{{ $errors->first('titulo') }}</strong>
                                </span>
                            @endif
                    </div>

                    <div class="form-group">
                        <label class="form-label">Subtitulo</label>
                        <input type="text" class="form-control" name="subtitulo" value="{{ isset($libro) ? $libro->subtitulo : '' }}" placeholder="Subtitulo del libro">
                    </div>

                    <div class="form-group">
                        <label class="form-label">ISBN</label>
                        <input type="text" class="form-control" name="isbn" value="{{ isset($libro) ? $libro->isbn : '' }}" placeholder="ISBN del libro">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Autor</label>
                        <input type="text" class="form-control" name="autor" value="{{ isset($libro) ? $libro->autor : '' }}" placeholder="Autor del libro">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Editorial</label>
                        <input type="text" class="form-control" name="editorial" value="{{ isset($libro) ? $libro->editorial : '' }}" placeholder="Editorial del libro">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Año</label>
                        <input type="text" class="form-control" name="anio" value="{{ isset($libro) ? $libro->anio : '' }}" placeholder="Año del libro">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Genero</label>
                        <input type="text" class="form-control" name="genero" value="{{ isset($libro) ? $libro->genero : '' }}" placeholder="Genero del libro">
                    </div>


                    <div class="form-group">
                        <label class="form-label">Idioma</label>
                        <input type="text" class="form-control" name="idioma" value="{{ isset($libro) ? $libro->idioma : '' }}" placeholder="Idioma del libro">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Seccion</label>
                        <input type="text" class="form-control" name="seccion" value="{{ isset($libro) ? $libro->seccion : '' }}" placeholder="Sección del libro">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Ejemplar</label>
                        <input type="text" class="form-control" name="ejemplar" value="{{ isset($libro) ? $libro->ejemplar : '' }}" placeholder="No. de ejemplar del Libro">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Dias Maximo de Prestamo</label>
                        <input type="text" class="form-control" name="diasMaxPrestamo" value="{{ isset($libro) ? $libro->diasMaxPrestamo : '' }}" placeholder="Días Maximos de prestamo del libro">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Bibliotecas</label>
                        <select name="biblioteca_id" class="form-control">
                            @foreach($bibliotecas as $biblioteca)
                                @if(!isset($biblio))
                                    <option value="{{ $biblioteca->id }}" {{ isset($libro) && ($libro->biblioteca_id == $biblioteca->id) !== false ? 'selected' : ''}}>{{ $biblioteca->nombre }}</option>
                                @elseif($biblioteca->id == $biblio)
                                    <option value="{{ $biblioteca->id }}"> {{ $biblioteca->nombre }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Link Imagen</label>
                        <input type="text" class="form-control" name="linkImagen" value="{{ isset($libro) ? $libro->linkImagen : '' }}" placeholder="Imagen del ejemplar del Libro">
                    </div>

                    <button type="submit" class="btn btn-primary ml-auto">Aceptar</button>

                </form>

            </div>
        </div>
    </div>
</div>

@endsection