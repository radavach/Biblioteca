@extends('layouts.tabler')
@section('contenido')

<div class="page-header">
    <div class="page-title">
        INDEX BIBLIOTECAS
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
                        @foreach ($bibliotecas as $biblioteca)
                            <tr>
                                <td><a href="{{ route('bibliotecas.show', $biblioteca->id) }}">{{ $biblioteca->id }}</a></td>
                                <td>{{ $biblioteca->nombre }}</td>
                                <td>{{ $biblioteca->horaApertura }}</td>
                                <td>{{ $biblioteca->horaCierre }}</td>
                                <td>{{ $biblioteca->dias }}</td>
                                <td>{{ $biblioteca->telefono }}</td>
                                <td>{{ $biblioteca->paginaWeb }}</td>
                                <td>{{ $biblioteca->facebook }}</td>
                                <td>{{ $biblioteca->email }}</td>
                                <td><a href="{{ route('bibliotecas.edit', $biblioteca->id) }}" class="btn btn-sm btn-warning">Editar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                 </table>
            </div>
        </div>
    </div>
</div>

@endsection