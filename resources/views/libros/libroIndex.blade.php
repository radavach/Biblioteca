@extends('layouts.tabler')
@section('contenido')

<div class="page-header">
    <div class="page-title">
        INDEX LIBRO
    </div>

    <div class="col-lg-3 ml-auto">
        @if(!isset($biblioteca_id))
            <form action = " {{ route('libros.index') }}" class="input-icon my-3 my-lg-0" method="GET">
        @else        
            <form action = " {{ route('bibliotecas.libros.index', $biblioteca_id) }}" class="input-icon my-3 my-lg-0" method="GET">
        @endif
            
            <input type="search" class="form-control header-search" placeholder="Search&hellip;" tabindex="1" name="buscar">
            <div class="input-icon-addon">
            <i class="fe fe-search"></i>
            </div>
        </form>
    </div>    
</div>

@include('extra.mensajes')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Bienvenido al sistema compañero trabajador!</h3>
                <div class="ml-auto">
                    @if(!isset($biblioteca_id) && \Auth::user() !== null && Gate::check('permisos_admin'))
                        <form class="input-icon my-3 my-lg-0" action="{{ route('libros.create') }}">
                            <button type="submit" class="btn ">Registrar Libros</button>
                        </form>
                    @elseif(isset($biblioteca_id) && \Auth::user() !== null && (Gate::check('permisos_admin') || \Auth::user()->biblioteca_id == $biblioteca_id))
                        <form class="input-icon my-3 my-lg-0" action="{{ route('bibliotecas.libros.create', $biblioteca_id) }}">
                            <button type="submit" class="btn ">Registrar Libros</button>
                        </form>
                    @endif
                </div>
            </div>
            
            <div class="card-body">
                <table class="table table-hover table-dark" >

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Título</th> 
                            <th>Autor</th>
                            <th>ISBN</th> 
                            <th>Ejemplares</th>
                            @if(\Auth::user() !== null)<th>Acciones</th>@endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($libros as $libro)
                        <!-- ///<img class="group list-group-image" src="images-database/{{$libro->link}}" alt=" "> -->
                            <tr>
                                <td>
                                    @if(!isset($biblioteca_id))
                                        <a class="a-ESE-ENLACE-ES-MIO" href="{{ route('libros.show', $libro->id) }}">{{ $libro->id }}</a>
                                    @else
                                        <a class="a-ESE-ENLACE-ES-MIO" href="{{ route('bibliotecas.libros.show', [$biblioteca_id, $libro->id]) }}">{{ $libro->id }}</a>
                                    @endif
                                </td>
                                <td>{{ $libro->titulo }}</td>
                                <td>{{ $libro->autor }}</td>
                                <td>{{ $libro->isbn }}</td>
                                <td>
                                    @if(count($libro->ejemplares))
                                        @foreach($libro->ejemplares as $ejemplar)
                                        <ul class="nav nav-tabs border-0 ">
                                            <li class="nav-item a-ESE-ENLACE-ES-MIO">{{ ($ejemplar->numEjemp)? $ejemplar->numEjemp : $ejemplar->id }} - {{ $ejemplar->nombre }} {{ ($ejemplar->estado)? 'Disponible' : 'Ocupado' }}</li>
                                        </ul>
                                        @endforeach
                                    @else
                                        <h6>No hay ejemplares</h6>
                                    @endif
                                </td>
                                @if(\Auth::user() !== null)
                                    <td>
                                            <a href="{{ route('libros.edit', $libro->id) }}" class = "btn btn-sm btn-warning">Editar</a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-lg-2 ml-auto">
                {{ $libros->links() }}
            </div>
        </div>
    </div>
</div>
@endsection