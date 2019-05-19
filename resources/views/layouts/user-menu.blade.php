<?php 
    if(!isset($_SESSION)){
        session_start();
    } 
?>
<div class="dropdown">
    <a href="#" class="nav-link pr-0 leading-none clas-esp" data-toggle="dropdown">
    <span class="avatar" style="background-image:" @php 
            if(Auth::user() !== null): 
                isset(Auth::user()->imagen)? print 'url(./demo/faces/female/'.\Auth::user()->imagen.'.jpg)' : print 'url(./assets/images/imagenes/'.\Auth::user()->id.'.jpg)';
            else: 
                isset($_SESSION['icon_num'])? print 'url(./assets/images/imagenes/'.$_SESSION['icon_num'].'.jpg)' : print 'url(./assets/images/imagenes/3.jpg)'; 
            endif;@endphp
    </span>
    <span class="ml-2 d-none d-lg-block">
        <span class="text-default texto-celestial-blue">@if(Auth::user() !== null) {{ Auth::user()->name }} @else Anonimo @endif </span>
        @if(isset(Auth::user()->rol)) <small class="text-muted d-block mt-1 texto-resolution-blue">{{ Auth::user()->rol }} </small> @endif
        <small class="text-muted d-block mt-1 texto-resolution-blue">@if(Auth::user()->esAdmin) Administrador @else Empleado  @endif</small>
    </span>
    </a>
    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
    <a class="dropdown-item" href="#">
        <i class="dropdown-icon fe fe-lock"></i> Profile
    </a>
    <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
        <i class="dropdown-icon fe fe-log-out"></i> Sign out
    </a>
    
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    </div>
</div>