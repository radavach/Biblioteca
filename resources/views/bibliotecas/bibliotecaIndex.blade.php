@extends('layouts.tabler')
@section('contenido')
@php if(!isset($_SESSION)) session_start(); @endphp
<div class="page-header">
    <div class="page-title">
        INDEX BIBLIOTECAS
    </div>
    @if((\Auth::user() === null || Gate::check('permisos_admin')) && (!isset($_SESSION['biblioteca'])))
    <div class="col-lg-3 ml-auto">
        <form action = " {{ route('bibliotecas.index') }}" class="input-icon my-3 my-lg-0" method="POST">
            @csrf
            <input type="search" class="form-control header-search" placeholder="Search&hellip;" tabindex="1" name="buscar">
            <div class="input-icon-addon">
            <i class="fe fe-search"></i>
            </div>
        </form>
    </div>
    @endif
</div>

@include('extra.mensajes')  

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Bienvenido al sistema</h3>

                @if(!isset($biblioteca_id))
                    <div class="ml-auto">
                        <form class="input-icon my-3 my-lg-0" action="{{ route('bibliotecas.create') }}">
                            @csrf
                            <button type="submit" class="btn ">Registrar Biblioteca</button>
                        </form>
                    </div>
                @endif

            </div>

            <div class="card-body">
                <table class="table table-hover table-dark" >
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th> 
                            <th>Hora de Apertura</th> 
                            <th>Hora de Cierre</th> 
                            <th>Dias</th> 
                            <th>Telefono</th> 
                            <th>Pagina Web</th> 
                            <th>Facebook</th> 
                            <th>Email</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bibliotecas as $biblio)
                            <tr>
                                <td>
                                    @if(!isset($biblioteca_id))
                                        <a class= "a-ESE-ENLACE-ES-MIO" href="{{ route('bibliotecas.show', $biblio->id) }}">{{ $biblio->id }}</a>
                                    @else
                                        <a class= "a-ESE-ENLACE-ES-MIO" href="{{ route('bibliotecas.bibliotecas.show', [$biblioteca_id, $biblio->id]) }}">{{ $biblio->id }}</a>
                                    @endif
                                </td>
                                <td>{{ $biblio->nombre }}</td>
                                <td>{{ $biblio->horaApertura }}</td>
                                <td>{{ $biblio->horaCierre }}</td>
                                <td>{{ $biblio->dias }}</td>
                                <td>{{ $biblio->telefono }}</td>
                                <td>{{ $biblio->paginaWeb }}</td>
                                <td>{{ $biblio->facebook }}</td>
                                <td>{{ $biblio->email }}</td>
                                <td>
                                    @if(isset($biblioteca_id))
                                        <a href="{{ route('bibliotecas.bibliotecas.edit', [$biblioteca_id, $biblio->id]) }}" class="btn btn-sm btn-warning">Editar</a>
                                    @else
                                        <a href="{{ route('bibliotecas.edit', $biblio->id) }}" class="btn btn-sm btn-warning">Editar</a>
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