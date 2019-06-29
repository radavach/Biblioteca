@extends('layouts.tabler')
@section('contenido')

<div class="page-header">
    <div class="page-title">
        SHOW CLIENTE
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>{{ $cliente->nombre_apellidos }}</h3>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-2">
                        <img class="card-img-top" src="{{asset('images/imagenes')}}/{{$cliente->id ?? $icon_num}}.jpg" alt="No hay imagen disponible">
                    </div>
                    <div class="col-md-3">
                        <h5>
                            <p>ID</p>
                            <p>Nombre</p> 
                            <p>Nombre Usuario</p> 
                            <p>Telefono</p> 
                            <p>Direccion</p> 
                            <p>Correo Electronico</p> 
                            <p>Acciones</p>
                        </h5>
                    </div>
                    <div class="col-md-6">
                        <h5>
                            <p>{{ $cliente->id }}</p>
                            <p>{{ $cliente->nombre }} {{ $cliente->apellidoPaterno }} {{ $cliente->apellidoMaterno }}</p>
                            <p>{{ $cliente->nombreUsuario }}</p>
                            <p>{{ $cliente->telefono }}</p>
                            <p>{{ $cliente->direccion }}</p>
                            <p>{{ $cliente->email }}</p>
                            @if(\Auth::user() !== null && Gate::check('permisos_admin'))
                                <p>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <a href="{{ route('bibliotecas.clientes.edit', [$biblioteca_id, $cliente->id]) }}" class="btn btn-sm btn-warning">
                                                <i class="fe fe-edit-3"></i>
                                                Editar
                                            </a>
                                        </div>
                                        <div class="col-md-2">
                                            <form action="{{ route('bibliotecas.clientes.destroy', [$biblioteca_id, $cliente->id]) }}" method="POST">
                                                <input type="hidden" name="_method" value="DELETE"> 
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fe fe-trash-2"></i>                                    
                                                    Borrar
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </p>
                            @endif
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection