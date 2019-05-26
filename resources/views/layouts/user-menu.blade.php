<div class="dropdown">
    <a href="#" class="nav-link pr-0 leading-none clas-esp" data-toggle="dropdown">
    <span class="avatar" style="background-image: <?php 
            if(\Auth::user() !== null): 
                isset(\Auth::user()->imagen)? 
                    print 'url(./assets/images/imagenes/'.Auth::user()->imagen.'.jpg)' : 
                    print 'url(./assets/images/imagenes/'.((Auth::user()->id % 80) + 1).'.jpg)';
            else: 
                isset($icon_num)? 
                    // print 'url(./assets/images/imagenes/'.$icon_num.'.jpg)' : 
                    print 'url(./assets/images/imagenes/'.$icon_num.'.jpg)' : 
                    print 'url(./assets/images/imagenes/3.jpg)'; 
            endif; ?> ">
    </span>
    <span class="ml-2 d-none d-lg-block">
        <span class="text-default texto-celestial-blue">@if(Auth::user() !== null) {{ Auth::user()->name }} @else Anonimo @endif </span>
        @if(isset(Auth::user()->rol)) <small class="text-muted d-block mt-1 texto-resolution-blue">{{ Auth::user()->rol }} </small> @endif
        @if(\Auth::user() !== null)<small class="text-muted d-block mt-1 texto-resolution-blue">@if(Auth::user()->esAdmin) Administrador @else Empleado  @endif</small> @endif
    </span>
    </a>
    
    <div id="menu-user-dropdown" class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
        
        @if(\Auth::user() !== null)
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
        @else
            <a class="dropdown-item" href="{{ route('login') }}">
                <i class="dropdown-icon fe fe-lock"></i> Iniciar sesion
            </a>
        @endif
    </div>
</div>