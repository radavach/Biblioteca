<?php 
if(!isset($_SESSION)){
  session_start(); 
}
?>

<div class="col-lg order-lg-first">
  <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
    <li class="nav-item">
      <a href="{{ route('inicio') }}" class="nav-link active"><i class="fe fe-home"></i> Inicio</a>
    </li>
    <li class="nav-item">

    @if(isset($_SESSION['biblioteca']))

    <li class="nav-item">
      @if(\Auth::user() === null || Gate::check('permisos_admin'))
        <a href="{{ route('bibliotecas.index') }}" class="nav-link active"><i class="fe fe-book-open"></i> Bibliotecas</a>
      @else
        <a href="{{ route('bibliotecas.unaBiblioteca.index', $_SESSION['biblioteca']) }}" class="nav-link active"><i class="fe fe-book-open"></i> Bibliotecas</a>
      @endif
    </li>

    <li class="nav-item">
      <a href="{{ route('bibliotecas.librosB.index', $_SESSION['biblioteca']) }}" class="nav-link active"><i class="fe fe-book"></i> Libros</a>
    </li>

    <li class="nav-item">
      <a href="{{ route('materiales.index') }}" class="nav-link active"><i class="fe fe-scissors"></i> Materiales</a>
    </li>
    
    <li class="nav-item">
      <a href="{{ route('clientes.index') }}" class="nav-link active"><i class="fe fe-users"></i> Clientes</a>
    </li>
    
    @else
    
    @if((\Auth::user() === null) || Gate::check('permisos_admin'))
      <li class="nav-item">
        <a href="{{ route('bibliotecas.index') }}" class="nav-link active"><i class="fe fe-book-open"></i> Bibliotecas</a>
      </li>

      <li class="nav-item">
        <a href="{{ route('libros.index') }}" class="nav-link active"><i class="fe fe-book"></i> Libros</a>
      </li>
    @endif
    
    @endif
  </ul>
</div>
<!-- 
<div class="col-lg order-lg-first">
  <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
    <li class="nav-item">
      <a href="{{ route('inicio') }}" class="nav-link active"><i class="fe fe-home"></i> Inicio</a>
    </li>
    <li class="nav-item">
      <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-book-open"></i> Bibliotecas</a>
      <div class="dropdown-menu dropdown-menu-arrow">
        
        <a href="{{ route('bibliotecas.index') }}" class="dropdown-item ">Inicio</a>
        @if(Auth::user() !== null) @can('permisos_admin')<a href="{{ route('bibliotecas.create') }}" class="dropdown-item ">Crear</a> @endcan @endif

      @if(isset($_SESSION['biblioteca'])) 
        <div class="dropdown-divider"></div>
        <h6 class="dropdown-header texto-celestial-blue"><i class="fe fe-send"></i>Prestamos</h6>
        <div class="dropdown-divider"></div>
        <a href="{{ route('bibliotecas.index') }}" class="dropdown-item ">Inicio</a>
        @if(Auth::user() !== null) @can('permisos_admin')<a href="{{ route('bibliotecas.create') }}" class="dropdown-item ">Crear</a> @endcan @endif
        
        <div class="dropdown-divider"></div>
        <h6 class="dropdown-header texto-celestial-blue"><i class="fe fe-book"></i>Libros</h6>
        <div class="dropdown-divider"></div>
        <a href="{{ route('bibliotecas.index') }}" class="dropdown-item ">Inicio</a>
        @if(Auth::user() !== null) @can('permisos_admin')<a href="{{ route('bibliotecas.create') }}" class="dropdown-item ">Crear</a> @endcan @endif
        
        <div class="dropdown-divider"></div>
        <h6 class="dropdown-header texto-celestial-blue"><i class="fe fe-scissors"></i>Materiales</h6>
        <div class="dropdown-divider"></div>
        <a href="{{ route('bibliotecas.index') }}" class="dropdown-item ">Inicio</a>
        @if(Auth::user() !== null) @can('permisos_admin')<a href="{{ route('bibliotecas.create') }}" class="dropdown-item ">Crear Registro</a> @endcan @endif
      @endif
      </div>
    
    @if(isset($_SESSION['biblioteca']))
    </li>
    <li class="nav-item dropdown">
      <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-users"></i> Clientes</a>
      <div class="dropdown-menu dropdown-menu-arrow">
        <a href="{{ route('clientes.index') }}" class="dropdown-item ">Inicio</a>
        @if(Auth::user() !== null) @can('permisos_admin')<a href="{{ route('clientes.create') }}" class="dropdown-item ">Agregar</a> @endcan @endif
        <a href="https://giphy.com/gifs/4Ej4ELEyt0Uta" class="dropdown-item ">Carrousel</a>
      </div>
    </li>

    <li class="nav-item dropdown">
      <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-user"></i> Empleados</a>
      <div class="dropdown-menu dropdown-menu-arrow">
        <a href="{{ route('empleados.index') }}" class="dropdown-item ">Inicio</a>
        @if(Auth::user() !== null) @can('permisos_admin') <a href="{{ route('empleados.create') }}" class="dropdown-item ">Registrar</a> @endcan @endif
        
      </div>
    </li>
    @endif
  </ul>
</div> -->