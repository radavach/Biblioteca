@extends('layouts.tabler')
@section('contenido')

<div class="page-header">
    <div class="page-title">
        SHOW LIBRO
    </div>
</div>

<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="card">
            <div class="card-header">
                <h3>{{ $libro->titulo }}</h3>
            </div>
            <img class="card-img-top" src="images-database/{{$libro->linkImagen}}" alt="">
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
                            <p >{{ $libro->linkImagen ?? 'No disponible'}}</p>
                            @if(\Auth::user() !== null && (Gate::check('permisos_admin') || (\Auth::user()->biblioteca_id == $biblioteca_id)))
                                <p>
                                    <a href="{{ route('bibliotecas.libros.edit', [$libro->biblioteca_id, $libro->id]) }}" class="btn btn-sm btn-warning">
                                        Editar
                                    </a>
                                    @can('permisos_admin')
                                        <form action="{{ route('bibliotecas.libros.destroy', [$libro->biblioteca_id, $libro->id]) }}" method="POST">
                                            <input type="hidden" name="_method" value="DELETE">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                Borrar
                                            </button>
                                        </form>
                                    @endcan
                                </p>
                            @endif
                        <h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-10 offset-md-1">
        <div class="card">
            <div class="card-header">Ejemplares</div>
            <div class="card-body">
                <table class="table table-hover table-dark">
                    <thead>
                        <tr>
                            <th>Número de ejemplar</th>
                            <th>Origen</th>
                            <th>Estado</th>
                            @if(\Auth::user())<th>Acciones</th>@endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($libro->ejemplares as $ejemplar)
                            <tr>
                                <td>
                                    <a class="a-ESE-ENLACE-ES-MIO" href="{{ route('bibliotecas.libros.ejemplares.index', [$libro->biblioteca_id, $libro->id]) }}"> 
                                        {{ $ejemplar->numEjemp ?? $ejemplar->id }}
                                    </a>
                                </td>
                                <td>{{ $ejemplar->origen ?? 'No disponible' }}</td>
                                <td>{{ $ejemplar->estado? 'Disponible' : 'Prestado' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection