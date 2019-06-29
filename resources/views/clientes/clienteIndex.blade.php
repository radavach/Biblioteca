@extends('layouts.tabler')
@section('contenido')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>BIBLIOTECA - <a class="enlace_no_fondo" href="{{ route('bibliotecas.index', [$biblioteca_id]) }}">{{ $biblioteca_id->nombre }}</a></h3>
                
                <div class="ml-auto">
                    <form class="input-icon my-3 my-lg-0" action="{{ route('bibliotecas.clientes.create', $biblioteca_id) }}" method="GET">
                        <button type="submit" class="btn btn-green"><i class="fe fe-user"></i> Registrar Cliente</button>
                    </form>
                
                    <form class="input-icon my-3 my-lg-0" action="{{ route('bibliotecas.clientes.adeudos', $biblioteca_id) }}" method="GET">
                        <button type="submit" class="btn btn-orange"><i class="fe fe-users"></i> Clientes con pendientes</button>
                    </form>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-hover table-dark" >

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th> 
                            <th colspan="2">Apellido</th> 
                            <th>Nombre Usuario</th> 
                            <th>Telefono</th> 
                            <th>Direccion</th> 
                            <th>Correo Electronico</th> 
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clientes as $cliente)
                            <tr>
                                <td>
                                    <a class= "enlace_no_fondo" href="{{ route('bibliotecas.clientes.show', [$biblioteca_id, $cliente->id]) }}">{{ $cliente->id }}</a>
                                </td>
                                <td>{{ $cliente->nombre }}</td>
                                <td>{{ $cliente->apellidoPaterno }}</td>
                                <td>{{ $cliente->apellidoMaterno }}</td>
                                <td>{{ $cliente->nombreUsuario }}</td>
                                <td>{{ $cliente->telefono }}</td>
                                <td>{{ $cliente->direccion }}</td>
                                <td>{{ $cliente->email }}</td>
                                <td>
                                    <a href="{{ route('bibliotecas.clientes.edit', [$biblioteca_id, $cliente->id]) }}" class="btn btn-sm btn-warning">
                                        <i class="fe fe-edit-3"></i>
                                        Editar
                                    </a>
                                    <form action="{{ route('bibliotecas.clientes.destroy', [$biblioteca_id, $cliente->id]) }}" method="POST">
                                        <input type="hidden" name="_method" value="DELETE"> 
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fe fe-trash-2"></i>
                                            Borrar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-lg-3 ml-auto">
                {{ $clientes->links() }}
            </div>
        </div>
    </div>
</div>
@endsection