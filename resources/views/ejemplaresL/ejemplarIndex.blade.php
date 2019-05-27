@extends('layouts.tabler')
@section('contenido')

<div class="page-header">
    <div class="page-title">
        EJEMPLAR
    </div>
</div>

@include('extra.mensajes')

<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="card">
            <div class="card-header">
                <h3>  {{ $ejemplar->libro->titulo }} - {{ $ejemplar->estado ? 'Disponible' : 'Prestado' }}</h3>
            </div>

            <div class="card-body">
                <div class="row" >
                    <div class="col-md-3">
                        <img class="card-img-top" src="{{$ejemplar->libro->linkImagen}}" alt="No hay imagen disponible">
                    </div>
                    <div class="col-md-3">
                        <b>
                            <p>Subtítulo</p> 
                            <p>Idioma</p>
                            <p>Sección</p>
                            <p>Ejemplar</p>
                            <p>Origen</p>
                            <p>Comentario</p>
                            <p>Días Máximos de Préstamo</p>
                            @if(\Auth::user())<p>Acciones</p>@endif
                        </b>
                    </div>
                    
                    <div class="col-md-6">
                        
                            <p>{{ $ejemplar->libro->subtitulo ?? 'No disponible'}}</p>
                            <p>{{ $ejemplar->libro->idioma ?? 'No disponible'}}</p>
                            <p>{{ $ejemplar->libro->seccion ?? 'No disponible'}}</p>
                            <p>{{ $ejemplar->libro->ejemplar ?? 'No disponible'}}</p>
                            <p>{{ $ejemplar->origen ?? 'No disponible' }}</p>
                            <p>{{ $ejemplar->comentario ?? 'No hay comentarios' }}</p>
                            <p>{{ $ejemplar->libro->diasMaxPrestamo ?? 'No disponible'}}</p>
                            @if(\Auth::user() !== null && (Gate::check('permisos_admin') || (\Auth::user()->biblioteca_id == $biblioteca_id)))
                                <p>
                                    <div class="row">
                                        <div class="col-md-2">
                                           <a href="#" class ="btn btn-sm btn-warning"> Realizar prestamo </a>
                                        </div>
                                        @can('permisos_admin')
                                            <div class="col-md-2">
                                                
                                            </div>
                                        @endcan
                                    </div>
                                </p>
                            @endif
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-10 offset-md-1">
        <div class="card">
            <div class="card-header">Historial de adeudos</div>
            <div class="card-body">
                <table class="table table-hover table-dark">
                    <thead>
                        <tr>
                            <th>Fecha de prestamo</th>
                            <th>Fecha limite</th>
                            <th>Comision</th>
                            <th>ISBN</th>
                            @if(\Auth::user() !==null)
                                <th>ISBN</th>
                                <th>Acciones</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ejemplar->movimientos as $movimiento)
                            <tr>
                                <td>
                                    {{ $movimiento->pivot->fechaPrestamo }}
                                </td>
                                <td>{{ date ( 'Y-m-j' , strtotime($movimiento->pivot->fechaPrestamo. "+ ".$ejemplar->libro->diasMaxPrestamo." days")) }}</td>
                                <td>{{ $movimiento->pivot->comision }}</td>
                                <td>{{ $movimiento->pivot->isbnLibro }}</td>
                                @if(\Auth::user() !== null && (\Auth::user()->biblioteca_id == $biblioteca_id || Gate::check('permisos_admin')))
                                    <td>
                                       
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