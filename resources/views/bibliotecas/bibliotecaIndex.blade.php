@extends('layouts.tabler')
@section('contenido')

<div class="page-header">
    <div class="page-title">
        INDEX BIBLIOTECAS
    </div>
    
    @if(!isset($biblioteca_id))
    <div class="col-lg-3 ml-auto">

        <form action = " {{ route('bibliotecas.index') }}" class="input-icon my-3 my-lg-0" method="POST">
            @csrf
            <input type="search" class="form-control header-search" placeholder="Buscar&hellip;" tabindex="1" name="buscar">
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

                @if(!isset($biblioteca_id) && \Auth::user() !== null && Gate::check('permisos_admin'))
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
                            <th>Teléfono</th> 
                            <th>Página Web</th> 
                            @if(\Auth::user() !== null)<th>Acciones</th>@endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bibliotecas as $biblioteca)
                            <tr>
                                <td>
                                    @if(!isset($biblioteca_id))
                                        <a class= "a-ESE-ENLACE-ES-MIO" href="{{ route('bibliotecas.show', $biblioteca->id) }}">{{ $biblioteca->id }}</a>
                                    @else
                                        <a class= "a-ESE-ENLACE-ES-MIO" href="{{ route('bibliotecas.bibliotecas.show', [$biblioteca_id, $biblioteca->id]) }}">{{ $biblioteca->id }}</a>
                                    @endif
                                </td>
                                <td>{{ $biblioteca->nombre }}</td>
                                <td>{{ $biblioteca->telefono }}</td>
                                <td>{{ $biblioteca->paginaWeb }}</td>
                                <td>
                                    @if(\Auth::user() !== null && (($biblioteca->id == \Auth::user()->biblioteca_id) || Gate::check('permisos_admin') ))
                                        @if(isset($biblioteca_id))
                                            <a href="{{ route('bibliotecas.bibliotecas.edit', [$biblioteca_id, $biblioteca->id]) }}" class="btn btn-sm btn-warning">Editar</a>
                                        @else
                                            <a href="{{ route('bibliotecas.edit', $biblioteca->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                        @endif
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                 </table>
            </div>
            <div class="col-lg-2 ml-auto">
                {{ $bibliotecas->links() }}
            </div>
        </div>
    </div>
</div>

@endsection