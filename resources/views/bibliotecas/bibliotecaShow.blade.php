@extends('layouts.app')
@section('content')
    <h1>Bienvenido al sistema compañero trabajador!</h1>
    <p>
        Formulario de aplicaciones
    </p>

    <div>
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
                    <tr>
                        <td>{{ $biblioteca->id }}</td>
                        <td>{{ $biblioteca->nombre }}</td>
                        <td>{{ $biblioteca->horaApertura }}</td>
                        <td>{{ $biblioteca->horaCierre }}</td>
                        <td>{{ $biblioteca->dias }}</td>
                        <td>{{ $biblioteca->telefono }}</td>
                        <td>{{ $biblioteca->paginaWeb }}</td>
                        <td>{{ $biblioteca->facebook }}</td>
                        <td>{{ $biblioteca->email }}</td>
                        <td>
                            <a href="{{ route('bibliotecas.edit', $biblioteca->id) }}" class="btn btn-sm btn-warning">
                                Editar
                            </a>
                            <form action="{{ route('bibliotecas.destroy', $biblioteca->id) }}" method="POST">
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
@endsection