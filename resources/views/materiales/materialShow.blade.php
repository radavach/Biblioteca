@extends('layouts.tabler')
@section('contenido')

<div class="page-header">
    <div class="page-title">
        SHOW MATERIAL
    </div>
</div>

@include('extra.mensajes')  

<div class="row justify-content-center">
    <div class="col-md-10 ">
        <div class="card">
            <div class="card-header">
                <h3>{{ $material->nombre }}</h3>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <p>Sección</p>
                        <p>Tipo</p>
                        <p>Ejemplar</p>
                        <p>Autor</p>
                        <p>Año</p>
                        <p>Imagen</p>
                        @if(\Auth::user() !== null)<p>Acciones</p>@endif
                    </div>
                    <div class="col-md-6">
                            <p>{{ $material->seccion ?? 'No disponible' }}</p>
                            <p>{{ $material->tipo ?? 'No disponible' }}</p>
                            <p>{{ $material->ejemplar ?? 'No disponible' }}</p>
                            <p>{{ $material->autor ?? 'No disponible' }}</p>
                            <p>{{ $material->anio ?? 'No disponible' }}</p>
                            <p>{{ $material->imagen ?? 'No disponible' }}</p>
                            @if(\Auth::user() !== null && (\Auth::user()->biblioteca_id == $material->biblioteca_id || Gate::check('permisos_admin')))
                                <p>     
                                    <div class="row">
                                        <div class="col-md-2">
                                            <a href="{{ route('bibliotecas.materiales.edit', [$material->biblioteca_id, $material->id]) }}" class="btn btn-sm btn-warning">
                                                <i class="fe fe-edit-3"></i>
                                                Editar
                                            </a>
                                        </div>
                                        @can('permisos_admin')
                                        <div class="col-md-2">
                                            <form action="{{ route('bibliotecas.materiales.destroy', [$material->biblioteca_id, $material->id]) }}" method="POST">
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
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <div class="col-md-10 ">
            <div class="card">
                <div class="card-header">Ejemplares</div>
                <div class="card-body">
                <table class="table table-hover table-dark" >
                    <thead>
                        <tr>
                            <th>Numero de ejemplar</th>
                            <th>Nombre</th>
                            <th>Estado</th>
                            @if(\Auth::user() !== null)<th>Acciones</th>@endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($material->ejemplares as $ejemplar)
                            <tr>
                                <td>
                                    <a class="a-ESE-ENLACE-ES-MIO" href="{{ route('bibliotecas.materiales.ejemplares.index', [$material->biblioteca_id, $material->id]) }}"> 
                                        {{ $ejemplar->numEjemp ?? $ejemplar->id }}
                                    </a>
                                </td>
                                <td>{{ $ejemplar->origen ?? 'No disponible' }}</td>
                                <td>{{ $ejemplar->estado? 'Disponible' : 'Prestado' }}</td>
                                @if(\Auth::user() !== null && (Gate::check('permisos_admin') || \Auth::user()->biblioteca_id == $biblioteca_id))
                                    <td>
                                        @if(isset($biblioteca_id))
                                            <a href="{{ route('bibliotecas.materiales.edit', [$material->biblioteca_id, $material->id]) }}" class="btn btn-sm btn-warning">Editar</a>
                                        @else
                                            <a href="{{ route('materiales.edit', $material->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                        @endif
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