@extends('layouts.tabler')
@section('contenido')

<div class="page-header">
    <div class="page-title">
        Selecciona un imagen para establecerla como la nueva imagen de perfil
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <center>
                @if(Session::has('num_imagenes'))
                    <div class="grid-container"> <!-- contenedor -->
                        @for($imagen = 0; $imagen < Session::get('num_imagenes'); ++$imagen) 
                            <a href="{{ route('photo.update', $imagen+1) }}"><img width="84" src="./images/imagenes/{{ ($imagen % 80 ) + 1 }}.jpg"></img></a>
                        @endfor
                    </div>
                @endif
            </center>
        </div>
    </div>
</div>

@endsection