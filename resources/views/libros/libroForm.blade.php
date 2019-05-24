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
                        <form action="{{ route('bibliotecas.libros.update', [$biblio, $libro->id]) }}" method="POST">
                            <input type="hidden" name="_method" value="PATCH">
                    @else
                        <form action="{{ route('bibliotecas.libros.store', $biblio) }}" method="POST">
                    @endif

                @endif

                    @csrf
                    
                    <div class="form-group">
                        <label class="form-label">{{__('Título')}}</label>
                        <input type="text" class="form-control{{ $errors->has('titulo') ? ' is-invalid' : ''}}" name="titulo" value="{{ isset($libro) ? $libro->titulo : old('titulo') }}" placeholder="Título del libro">
                            @if ($errors->has('titulo'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('titulo') }}</strong>
                                </span>
                            @endif
                    </div>

                    <div class="form-group">
                        <label class="form-label">{{ __('Subtitulo del Libro') }}</label>
                        <input type="text" class="form-control" name="subtitulo" value="{{ isset($libro) ? $libro->subtitulo : '' }}" placeholder="Subtitulo del libro">
                    </div>

                    <div class="form-group">
                        <label class="form-label">{{__('ISBN')}}</label>
                        <input type="text" class="form-control{{ $errors->has('isbn') ? ' is-invalid' : ''}}" name="isbn" value="{{ isset($libro) ? $libro->isbn : old('isbn') }}" placeholder="ISBN del libro">
                            @if($errors->has('isbn'))
                                <span class= "invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('isbn') }}</strong>
                                </span>
                            @endif
                   </div>

                    <div class="form-group">
                        <label class="form-label">{{__('Autor')}}</label>
                        <input type="text" class="form-control{{ $errors->has('autor') ? ' is-invalid' : ''}}" name="autor" value="{{ isset($libro) ? $libro->autor : old('autor') }}" placeholder="Autor del libro">
                             @if($errors->has('autor'))
                                <span class= "invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('autor') }}</strong>
                                </span>
                            @endif
                    </div>

                    <div class="form-group">
                        <label class="form-label">{{__('Editorial')}}</label>
                        <input type="text" class="form-control{{ $errors->has('editorial') ? ' is-invalid' : ''}}" name="editorial" value="{{ isset($libro) ? $libro->editorial : old('editorial') }}" placeholder="Editorial del libro">
                            @if($errors->has('editorial'))
                                <span class= "invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('editorial') }}</strong>
                                </span>
                            @endif
                    </div>

                    <div class="form-group">
                        <label class="form-label">{{__('Año')}}</label>
                        <input type="text" class="form-control{{ $errors->has('anio') ? ' is-invalid' : ''}}" name="anio" value="{{ isset($libro) ? $libro->anio : old('anio') }}" placeholder="Año del libro">
                            @if($errors->has('anio'))
                                <span class= "invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('anio') }}</strong>
                                </span>
                            @endif
                    </div>

                    <div class="form-group">
                        <label class="form-label">{{__('Género')}}</label>
                        <input type="text" class="form-control{{ $errors->has('genero') ? ' is-invalid' : ''}}" name="genero" value="{{ isset($libro) ? $libro->genero : old('genero') }}" placeholder="Género del libro">
                            @if($errors->has('genero'))
                                <span class= "invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('genero') }}</strong>
                                </span>
                            @endif
                    </div>


                    <div class="form-group">
                        <label class="form-label">{{__('Idioma')}}</label>
                        <input type="text" class="form-control{{ $errors->has('idioma') ? ' is-invalid' : ''}}" name="idioma" value="{{ isset($libro) ? $libro->idioma : old('idioma') }}" placeholder="Idioma del libro">
                            @if($errors->has('idioma'))
                                <span class= "invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('idioma') }}</strong>
                                </span>
                            @endif
                    </div>

                    <div class="form-group">
                        <label class="form-label">{{__('Sección')}}</label>
                        <input type="text" class="form-control{{ $errors->has('seccion') ? ' is-invalid' : ''}}" name="seccion" value="{{ isset($libro) ? $libro->seccion : old('idioma') }}" placeholder="Sección del libro">
                            @if($errors->has('seccion'))
                                <span class= "invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('seccion') }}</strong>
                                </span>
                            @endif
                    </div>

                    <div class="form-group">
                        <label class="form-label">{{__('Ejemplar')}}</label>
                        <input type="text" class="form-control{{ $errors->has('ejemplar') ? ' is-invalid' : ''}}" name="ejemplar" value="{{ isset($libro) ? $libro->ejemplar : old('ejemplar') }}" placeholder="No. de ejemplar del Libro">
                            @if($errors->has('ejemplar'))
                                <span class= "invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('ejemplar') }}</strong>
                                </span>
                            @endif
                    </div>

                    <div class="form-group">
                        <label class="form-label">{{__('Días Máximos de Préstamos')}}</label>
                        <input type="text" class="form-control{{ $errors->has('diasMaxPrestamo') ? ' is-invalid' : ''}}" name="diasMaxPrestamo" value="{{ isset($libro) ? $libro->diasMaxPrestamo : old('diasMaxPrestamo') }}" placeholder="Días Máximos de préstamo del libro">
                            @if($errors->has('diasMaxPrestamo'))
                                <span class= "invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('diasMaxPrestamo') }}</strong>
                                </span>
                            @endif
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">{{__('Bibliotecas')}}</label>
                        <select name="biblioteca_id" class="form-control{{ $errors->has('biblioteca_id') ? ' is-invalid' : ''}}">
                            @foreach($bibliotecas as $biblioteca)
                                @if(!isset($biblio))
                                    <option value="{{ $biblioteca->id }}" {{ isset($libro) && ($libro->biblioteca_id == $biblioteca->id) !== false ? 'selected' : ''}}>{{ $biblioteca->nombre }}</option>
                                @elseif($biblioteca->id == $biblio)
                                    <option value="{{ $biblioteca->id }}"> {{ $biblioteca->nombre }}</option>
                                @endif
                            @endforeach
                        </select>
                        @if ($errors->has('biblioteca_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('biblioteca_id') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="form-label">{{__('Imagen del ejemplar del libro')}}</label>
                        <input type="text" class="form-control{{ $errors->has('linkImagen') ? ' is-invalid' : ''}}" name="linkImagen" value="{{ isset($libro) ? $libro->linkImagen : old('linkImagen') }}" placeholder="Imagen del ejemplar del Libro">
                            @if($errors->has('linkImagen'))
                                <span class= "invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('linkImagen') }}</strong>
                                </span>
                            @endif
                    </div>

                    <button type="submit" class="btn btn-primary ml-auto">Aceptar</button>

                </form>

            </div>
        </div>
    </div>
</div>

@endsection