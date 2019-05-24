@extends('layouts.tabler')
@section('contenido')

<div class="page-header">
    <div class="page-title">
        INDEX LIBRO
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Bienvenido al sistema compañero trabajador!</h3>
                <div class="ml-auto">
                    @if(!isset($biblioteca_id))
                    <form class="input-icon my-3 my-lg-0" action="{{ route('libros.create') }}">
                        <button type="submit" class="btn ">Registrar Libros</button>
                    </form>
                    @else
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
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($libros as $libro)
                            <tr>
                                <td>
                                    @if(!isset($biblioteca_id))
                                        <a href="{{ route('libros.show', $libro->id) }}">{{ $libro->id }}</a>
                                    @else
                                        <a href="{{ route('bibliotecas.libros.show', [$biblioteca_id, $libro->id]) }}">{{ $libro->id }}</a>
                                    @endif
                                </td>
                                <td>{{ $libro->titulo }}</td>
                                <td>{{ $libro->autor }}</td>
                                <td>{{ $libro->isbn }}</td>
                                <td><a href="{{ route('libros.edit', $libro->id) }}" class = "btn btn-sm btn-warning">Editar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection