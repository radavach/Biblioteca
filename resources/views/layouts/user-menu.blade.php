@php session_start(); @endphp
<div class="dropdown">
    <a href="#" class="nav-link pr-0 leading-none clas-esp" data-toggle="dropdown">
    <span class="avatar" style="background-image: <?php isset(Auth::user()->imagen)? print 'url(./demo/faces/female/'.$Auth::user()->imagen.'.jpg)' : print 'url(./assets/images/imagenes/'.$_SESSION['icon_num'].'.jpg)'; ?>"></span>
    <!-- 'url(./assets/images/imagenes/Arato-Andras-1.jpg)' -->
    <span class="ml-2 d-none d-lg-block">
        <span class="text-default texto-celestial-blue">@if(Auth::user() !== null) {{ Auth::user()->name }} @else Anonimo @endif </span>
        <small class="text-muted d-block mt-1 texto-resolution-blue">@if(isset(Auth::user()->rol)) {{ Auth::user()->rol }} @endif</small>
    </span>
    </a>
    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
    <a class="dropdown-item" href="#">
        <i class="dropdown-icon fe fe-lock"></i> Profile
    </a>
    <a class="dropdown-item" href="#">
        <i class="dropdown-icon fe fe-settings"></i> Settings
    </a>
    <a class="dropdown-item" href="#">
        <span class="float-right"><span class="badge badge-primary">6</span></span>
        <i class="dropdown-icon fe fe-mail"></i> Inbox
    </a>
    <a class="dropdown-item" href="#">
        <i class="dropdown-icon fe fe-send"></i> Message
    </a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="#">
        <i class="dropdown-icon fe fe-help-circle"></i> Need help?
    </a>
    <a class="dropdown-item" href="#">
        <i class="dropdown-icon fe fe-log-out"></i> Sign out
    </a>
    </div>
</div>