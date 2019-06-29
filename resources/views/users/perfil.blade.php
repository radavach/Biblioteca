@extends('layouts.tabler')
@section('contenido')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <center>
                <a href="{{ route('photo.edit') }}">
                    <img src="./images/imagenes/<?php 
                        (\Auth::user()->imagen !== NULL)? 
                            print \Auth::user()->imagen : 
                            print (\Auth::user()->id % 80) + 1;
                        ?>.jpg"
                        alt="No hay imagen disponible" 
                        class="imgRedonda">
                </a>

                <br>
                
                <h3><a class="enlace_no_fondo" href="{{ route('profile.edit') }}">{{ \Auth::user()->name }} - {{ \Auth::user()->nombreUsuario }}</a></h3>
                <h5>Direccion: {{ \Auth::user()->direccion }}</h5>
                
                <br>
                
                <h3>Informacion de contacto</h3>
                <h5>Telefono: {{ \Auth::user()->telefono ?? '-' }}</h5> 
                <h5>Correo: {{ \Auth::user()->email ?? '-' }}</h5>
                <h5>RFC: {{ \Auth::user()->rfc ?? '-' }}</h5>

                <a class="btn btn-green" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                    <i class="fe fe-log-out"></i> Cerrar sesion
                </a>
                
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

            </center>

        </div>
    </div>
</div>

@endsection