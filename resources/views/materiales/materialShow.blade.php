@extends('layouts.tabler')
@section('contenido')
@php if(!isset($_SESSION)) session_start(); @endphp

<div class="page-header">
    <div class="page-title">
        INDEX MATERIALES
    </div>
</div>

@include('extra.mensajes')  

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Bienvenido al sistema</h3>
            </div>

            <div class="card-body">
                <table class="table table-hover table-dark" >
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Sección</th>
                            <th>Tipo</th>
                            <th>Ejemplar</th>
                            <th>Autor</th>
                            <th>Año</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $material->id }}</td>
                            <td>{{ $material->nombre }}</td>
                            <td>{{ $material->seccion }}</td>
                            <td>{{ $material->tipo }}</td>
                            <td>{{ $material->ejemplar }}</td>
                            <td>{{ $material->autor }}</td>
                            <td>{{ $material->anio }}</td>
                            <td>
                                @if(isset($biblioteca_id))
                                    <a href="{{ route('bibliotecas.materiales.edit', [$biblioteca_id, $material->id]) }}" class="btn btn-sm btn-warning">Editar</a>
                                @else
                                    <a href="{{ route('materiales.edit', $material->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                 </table>
            </div>
        </div>
    </div>
</div>

@endsection