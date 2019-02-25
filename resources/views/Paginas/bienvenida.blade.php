@extends('layouts.app')

@section('content')
    <h1>Bienvenido al sistema compañero trabajador!</h1>
    <p>
        Hola {{ $nombre }} {{ $apellido }}
    </p>
    <p>
        Nombre completo: {{$nombre_completo}}
    </p>
@endsection