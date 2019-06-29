@extends('layouts.tabler')
@section('contenido')

<div class="page-header">
    <div class="page-title">
        AGREGAR EJEMPLAR
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-10 ">
        <div class="card">
            <div class="card-header">
                <h3>{{ $libro->titulo }}</h3>
            </div>

            <div class="card-body">
                <div class="row" >
                    <div class="col-md-3">
                        <h5>
                            <p>Subtítulo</p> 
                            <p>ISBN</p> 
                            <p>Autor</p> 
                            <p>Editorial </p> 
                            <p>Año</p> 
                            <p>Género</p>
                            <p>Idioma</p>
                            <p>Sección</p>
                            <p>Ejemplar</p>
                            <p>Días Máximos de Préstamo</p>
                            <p>Imagen</p>
                        </h5>
                    </div>
                    <div class="col-md-6">
                        <h5>
                            <p>{{ $libro->subtitulo ?? 'No disponible'}}</p>
                            <p>{{ $libro->isbn ?? 'No disponible'}}</p>
                            <p>{{ $libro->autor ?? 'No disponible'}}</p>
                            <p>{{ $libro->editorial ?? 'No disponible'}}</p>
                            <p>{{ $libro->anio ?? 'No disponible'}}</p>
                            <p>{{ $libro->genero ?? 'No disponible'}}</p>
                            <p>{{ $libro->idioma ?? 'No disponible'}}</p>
                            <p>{{ $libro->seccion ?? 'No disponible'}}</p>
                            <p>{{ $libro->ejemplar ?? 'No disponible'}}</p>
                            <p>{{ $libro->diasMaxPrestamo ?? 'No disponible'}}</p>
                            <p>{{ $libro->linkImagen ?? 'No disponible'}}</p>
                        <h5>
                    </div>
                    
                    <div class="col-md-3">
                        <img class="card-img-top" src="{{ $libro->link }}" alt="">
                     </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-10 ">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Ejemplar</h3>
          </div>

            <div class="card-body">

                @include('extra.errores')

                @if(isset($ejemplar))
                    <form action="{{ route('bibliotecas.libros.ejemplares.update', [$biblioteca_id, $libro_id, $ejemplar->id]) }}" method="POST">
                        <input type="hidden" name="_method" value="PATCH">
                @else
                    <form action="{{ route('bibliotecas.libros.ejemplares.store', [$biblioteca_id, $libro_id]) }}" method="POST">
                @endif

                    @csrf
                    
                    <div class="form-group">
                        <label class="form-label">{{__('Número de Ejemplar')}}</label>
                        <input type="text" class="form-control" name="numEjemp" value="{{ $ejemplar->numEjemp ?? old('numEjemp') }}" placeholder="Número del ejemplar del libro">
                    </div>

                    <div class="form-group">
                        <label class="form-label">{{ __('Origen') }}</label>
                        <input type="text" class="form-control" name="origen" value="{{ $ejemplar->origen ?? old('origen') }}" placeholder="Origen del ejemplar">
                    </div>

                    <div class="form-group">
                        <label class="form-label">{{__('Comentario')}}</label>
                        <input type="text" class="form-control" name="comentario" value="{{ $ejemplar->comentario ?? old('comentario') }}" placeholder="Comentario sobre el ejemplar">
                   </div>

                   <div class="form-group">
                        <label for="estado" class="col-form-label text-md-right">{{ __('Estado') }}</label>
                        
                        <div class="col-md-6">
                            <input id="estado" type="radio" class="{{ $errors->has('estado') ? ' is-invalid' : '' }}" name="estado" value="1" checked> Disponible <br>
                            <input id="estado" type="radio" class="{{ $errors->has('estado') ? ' is-invalid' : '' }}" name="estado" value="0"> Prestado <br>
                            
                            @if ($errors->has('estado'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('estado') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary ml-auto">Aceptar</button>

                </form>

            </div>
        </div>
    </div>
</div>

@endsection