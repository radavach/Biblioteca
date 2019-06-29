@extends('layouts.tabler')
@section('contenido')

<div class="page-header">
    <div class="page-title">
        SHOW LIBRO
    </div>
</div>

@include('extra.mensajes')

<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <h3>{{ $libro->titulo }}</h3>
            </div>
                
            <div class="card-body">
                <div class="row" >
                    <div class="col-md-3">
                        <img class="card-img-top" src="{{ $libro->link }}" alt="">
                    </div>
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
                            @if(\Auth::user())<p>Acciones</p>@endif
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
                            @if(\Auth::user() !== null && (Gate::check('permisos_admin') || (\Auth::user()->biblioteca_id == $biblioteca_id)))
                                <p>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <a href="{{ route('bibliotecas.libros.edit', [$libro->biblioteca_id, $libro->id]) }}" class="btn btn-sm btn-warning">
                                                <i class="fe fe-edit-3"></i>
                                                Editar
                                            </a>
                                        </div>
                                        @can('permisos_admin')
                                            <div class="col-md-2">
                                                <form action="{{ route('bibliotecas.libros.destroy', [$libro->biblioteca_id, $libro->id]) }}" method="POST">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        <i class="fe fe-trash-2"></i>
                                                        Borrar
                                                    </button>
                                                </form>
                                            </div>
                                        @endcan
                                    </div>
                                </p>
                            @endif
                        <h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                Ejemplares

                
                @if(isset($biblioteca_id) && \Auth::user() !== null && (Gate::check('permisos_admin') || Gate::check('es_trabajador', $biblioteca_id)))
                    <div class="ml-auto">
                        <form class="input-icon my-3 my-lg-0" action="{{ route('bibliotecas.libros.ejemplares.create', [$biblioteca_id, $libro]) }}">
                            <button type="submit" class="btn btn-green">
                                Registrar Ejemplar
                                <i class="fe fe-share"></i>
                            </button>
                        </form>
                    </div>
                @endif
            </div>
            <div class="card-body">
                <table class="table table-hover table-dark">
                    <thead>
                        <tr>
                            <th>Número de ejemplar</th>
                            <th>Origen</th>
                            <th>Estado</th>
                            @if(\Auth::user() !== null)<th>Acciones</th>@endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($libro->ejemplares as $ejemplar)
                            <tr>
                                <td>
                                    <a class="a-ESE-ENLACE-ES-MIO" href="{{ route('bibliotecas.libros.ejemplares.show', [$libro->biblioteca_id, $libro->id, $ejemplar]) }}"> 
                                        {{ $ejemplar->numEjemp ?? $ejemplar->id }}
                                    </a>
                                </td>
                                <td>{{ $ejemplar->origen ?? 'No disponible' }}</td>
                                <td>{{ $ejemplar->estado? 'Disponible' : 'Prestado' }}</td>
                                @if(\Auth::user() !== null && (\Auth::user()->biblioteca_id == $biblioteca_id || Gate::check('permisos_admin')))
                                    <td>
                                        <a href="{{ route('bibliotecas.libros.ejemplares.edit', [$biblioteca_id, $libro->id, $ejemplar->id]) }}" class="btn btn-sm btn-warning">Editar</a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection