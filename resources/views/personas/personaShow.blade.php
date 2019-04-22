@extends('layouts.tabler')
@section('contenido')

<div class="page-header">
    <div class="page-title">
        SHOW PERSONA
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Bienvenido al sistema compañero trabajador!</h3>
            </div>

            <div class="card-body">
                <table class="table table-hover table-dark" >

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>ISBN</th> 
                            <th>Titulo</th> 
                            <th>Subtitulo</th> 
                            <th>Autor</th> 
                            <th>Editorial</th> 
                            <th>Año</th> 
                            <th>Genero</th>
                            <th>Idioma</th>
                            <th>Seccion</th>
                            <th>Ejemplar</th>
                            <th>Dias de Prestamo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $libro->id }}</td>
                            <td>{{ $libro->isbn }}</td>
                            <td>{{ $libro->titulo }}</td>
                            <td>{{ $libro->subtitulo }}</td>
                            <td>{{ $libro->autor }}</td>
                            <td>{{ $libro->editorial }}</td>
                            <td>{{ $libro->anio }}</td>
                            <td>{{ $libro->genero }}</td>
                            <td>{{ $libro->idioma }}</td>
                            <td>{{ $libro->seccion }}</td>
                            <td>{{ $libro->ejemplar }}</td>
                            <td>{{ $libro->diasMaxPrestamo }}</td>
                            <td>
                                <a href="{{ route('libros.edit', $libro->id) }}" class="btn btn-sm btn-warning">
                                    Editar
                                </a>
                                <form action="{{ route('libros.destroy', $libro->id) }}" method="POST">
                                    <input type="hidden" name="_method" value="DELETE"> 
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        Borrar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection