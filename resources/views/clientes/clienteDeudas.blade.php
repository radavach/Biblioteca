@extends('layouts.tabler')
@section('contenido')

<div class="page-header">
    <div class="page-title">
        INDEX CLIENTES
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
                            <th>Nombre</th>
                            <th>Nombre Usuario</th> 
                            <th>Correo Electrónico</th> 
                            <th>Libro</th>
                            <th>Fecha Prestamo</th>
                            <th>Fecha Limite</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < count($clientes); ++$i)
                            <tr>                
                                <th>{{ $clientes[$i]->nombre_apellidos }}</th>                
                                <td>{{ $clientes[$i]->nombreUsuario }}</td>
                                <td>{{ $clientes[$i]->email }}</td>
                                <td>{{ $deudas[$i]->ejemplar_l->libro->titulo }}</td>
                                <td>{{ $deudas[$i]->fechaPrestamo }}</td>
                                <td>{{ date ( 'Y-m-j' , strtotime($deudas[$i]->fechaPrestamo. "+ ".$deudas[$i]->ejemplar_l->libro->diasMaxPrestamo." days")) }}</td>
                                <td><a href="{{ route('bibliotecas.clientes.edit', [$biblioteca_id, $clientes[$i]->id]) }}" class = "btn btn-sm btn-warning">Editar</a></td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection