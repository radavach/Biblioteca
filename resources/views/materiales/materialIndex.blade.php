@extends('layouts.tabler')
@section('contenido')
@php if(!isset($_SESSION)) session_start(); @endphp
<div class="page-header">
    <div class="page-title">
        INDEX MATERIALES
    </div>
    <div class="col-lg-3 ml-auto">
        @if(!isset($biblioteca_id))
            <form action = " {{ route('materiales.index') }}" class="input-icon my-3 my-lg-0" method="POST">
        @else
            <form action = " {{ route('bibliotecas.materiales.index', $biblioteca_id) }}" class="input-icon my-3 my-lg-0" method="POST">
        @endif
            @csrf
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
                <h3>Bienvenido al sistema</h3>

                @if(\Auth::user() !== null)
                    <div class="ml-auto">
                        @if(!isset($biblioteca_id) && Gate::check('permisos_admin') )
                            <form class="input-icon my-3 my-lg-0" action="{{ route('materiales.create') }}">
                                <button type="submit" class="btn ">Registrar Material</button>
                            </form>
                        @elseif(\Auth::user()->$biblioteca_id == $biblioteca_id || Gate::check('permisos_admin'))
                            <form class="input-icon my-3 my-lg-0" action="{{ route('bibliotecas.materiales.create', $biblioteca_id) }}">
                                <button type="submit" class="btn ">Registrar Material</button>
                            </form>
                        @endif
                    </div>
                @endif
            </div>

            <div class="card-body">
                <table class="table table-hover table-dark" >
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Seccion</th>
                            <th>Autor</th>
                            @if(\Auth::user() !== null)<th>Acciones</th>@endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($materiales as $material)
                            <tr>
                                <td>
                                    @if(!isset($biblioteca_id))
                                        <a class= "a-ESE-ENLACE-ES-MIO" href="{{ route('materiales.show', $material->id) }}">{{ $material->id }}:((</a>
                                    @else
                                        <a class= "a-ESE-ENLACE-ES-MIO" href="{{ route('bibliotecas.materiales.show', [$biblioteca_id, $material->id]) }}">{{ $material->id }}</a>
                                    @endif
                                </td>
                                <td>{{ $material->nombre }}</td>
                                <td>{{ $material->seccion }}</td>
                                <td>{{ $material->autor }}</td>
                                @if(\Auth::user() !== null)
                                    <td>
                                        @if(isset($biblioteca_id))
                                            <a href="{{ route('bibliotecas.materiales.edit', [$biblioteca_id, $material->id]) }}" class="btn btn-sm btn-warning">Editar</a>
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