@extends('layouts.tabler')
@section('contenido')

@include('extra.mensajes')

<div class="page-header">
    <div class="page-title">
        AGREGAR EJEMPLAR
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-body">
                <form class="form-horizontal" method="POST" action="{{ route('movimientos.inicio') }}">
                    <div class="row">
                        @csrf
                    
                        <div class="form-group col-md-4">
                            <div class="row">
                                <div class="col-md-4  text-md-right">
                                    <label for="ejemplar" class="col-form-label text-md-right">Ejemplar</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="search" name="ejemplar" class="form-control" value="{{ isset($ejemplar)? $ejemplar->id : '' }}" placeholder="{{ isset($ejemplar)? $ejemplar->id : '' }}"></input>
                                </div>
                            </div>                        
                        </div>
                        
                        <div class="form-group col-md-4">
                            <div class="row">
    
                                <div class="col-md-4  text-md-right">
                                    <label for="cliente" class="col-form-label text-md-right">Cliente</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="search" name="cliente" class="form-control" value="{{ isset($cliente)? $cliente->id : '' }}" placeholder="{{ isset($cliente)? $cliente->id : '' }} "></input>
                                </div>
                            </div>                        
                        </div>

                        <div class="form-group col-md-1">
                            <button type="submit" class="btn-primary">Buscar</button>
                        </div>
                        
                        
                    </form>
                    @if(isset($cliente) and isset($ejemplar))
                        @if($ejemplar->estado)
                            <form method="GET" action="{{ route('realizar.prestamo', [$cliente, $ejemplar]) }}">
                                <div class="form-group col-md-1">
                                    <button type="submit" class="btn-orange">Prestamo</button>
                                </div>
                            </form>

                        @else
                            <form method="GET" action="{{ route('realizar.entrega', [$cliente, $ejemplar]) }}">
                                <div class="form-group col-md-1">
                                    <button type="submit" class="btn-orange">Entregar</button>
                                </div>
                            </form>
                        @endif
                    @endif
                </div>
                        
            </div>
        </div>
    </div>

    
    @isset($ejemplar)
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h3>Libro</h3>
                </div>
                <div class="card-body">
                    <div class="row" >
                        <div class="col-md-3">
                            <img class="card-img-top" src="{{$ejemplar->libro->link}}" alt="No hay imagen disponible">
                        </div>
                        <div class="col-md-3">
                            <b>
                                <p>Titulo</p>
                                <p>Subtitulo</p>
                                <p>Idioma</p>
                                <p>Origen</p>
                                <p>Comentario</p>
                            </b>
                        </div>
                        <div class="col-md-6">
                            <b>
                                <p>{{ $ejemplar->libro->titulo }}</p>
                                <p>{{ $ejemplar->libro->subtitulo ?? 'No disponible'}}</p>
                                <p>{{ $ejemplar->libro->idioma ?? 'No disponible'}}</p>
                                <p>{{ $ejemplar->origen ?? 'No disponible' }}</p>
                                <p>{{ $ejemplar->comentario ?? 'No hay comentarios' }}</p>
                            </b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @isset($cliente)
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h3>Cliente</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <img class="card-img-top" src="./images/imagenes/{{isset($cliente)? $cliente->id : $icon_num}}.jpg" alt="No hay imagen disponible">
                        </div>
                        <div class="col-md-3">
                            <b>
                                <p>Nombre</p>
                                <p>Nombre de usuario</p>
                                <p>Telefono</p>
                                <p>Correo</p>
                            </b>
                        </div>
                        <div class="col-md-6">
                            <b>
                                <p>{{ $cliente->nombre_apellidos }}</p>
                                <p>{{ $cliente->nombreUsuario }}</p>
                                <p>{{ $cliente->telefono }}</p>
                                <p>{{ $cliente->email }}</p>
                            </b>
                        </div>
                    <div>
                </div>
            </div>
        </div>
    @endif
</div>

@endsection