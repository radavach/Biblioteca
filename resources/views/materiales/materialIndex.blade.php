@extends('layouts.tabler')
@section('contenido')
@php if(!isset($_SESSION)) session_start(); @endphp
<div class="page-header">
    <div class="page-title">
        INDEX MATERIALES
    </div>
    <!-- @if((\Auth::user() === null || Gate::check('permisos_admin')) && (!isset($_SESSION['biblioteca'])))
    <div class="col-lg-3 ml-auto">
        <form action = " {{ route('materiales.index') }}" class="input-icon my-3 my-lg-0" method="POST">
            @csrf
            <input type="search" class="form-control header-search" placeholder="Search&hellip;" tabindex="1" name="buscar">
            <div class="input-icon-addon">
            <i class="fe fe-search"></i>
            </div>
        </form>
    </div>
    @endif -->
</div>

@include('extra.mensajes')  

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Bienvenido al sistema</h3>

                <div class="ml-auto">
                    @if(!isset($biblioteca_id))
                        <form class="input-icon my-3 my-lg-0" action="{{ route('materiales.create') }}">
                            <button type="submit" class="btn ">Registrar Material</button>
                        </form>
                    @else
                        <form class="input-icon my-3 my-lg-0" action="{{ route('bibliotecas.materiales.create', $biblioteca_id) }}">
                            <button type="submit" class="btn ">Registrar Material</button>
                        </form>
                    @endif
                </div>

            </div>

            <div class="card-body">
                <table class="table table-hover table-dark" >
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Sección</th>
                            <th>Autor</th>
                            <th>Acciones</th>
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
                                <td>
                                    @if(isset($biblioteca_id))
                                        <a href="{{ route('bibliotecas.materiales.edit', [$biblioteca_id, $material->id]) }}" class="btn btn-sm btn-warning">Editar</a>
                                    @else
                                        <a href="{{ route('materiales.edit', $material->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                 </table>
            </div>
        </div>
    </div>
</div>

@endsection