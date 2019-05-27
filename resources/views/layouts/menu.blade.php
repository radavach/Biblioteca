<div class="col-lg order-lg-first">
  <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
    <li class="nav-item">
      <a href="{{ route('inicio') }}" class="nav-link active"><i class="fe fe-home"></i> Inicio</a>
    </li>

    @if(\Auth::user() !== null and Gate::check('permisos_admin'))
      <li class="nav-item">
          <a class="nav-link active" href="{{ route('register') }}"><i class="fe fe-user"></i>Registrar Empleados</a>
      </li>
    @endif
    
    @if(isset($biblioteca_id))
      <li class="nav-item">
        @if(\Auth::user() === null || Gate::check('permisos_admin'))
          <a href="{{ route('bibliotecas.index') }}" class="nav-link active"><i class="fe fe-book-open"></i> Bibliotecas</a>
        @else
          <a href="{{ route('bibliotecas.bibliotecas.index', $biblioteca_id) }}" class="nav-link active"><i class="fe fe-book-open"></i> Bibliotecas</a>
        @endif
      </li>

      <li class="nav-item">
        <a href="{{ route('bibliotecas.libros.index', $biblioteca_id) }}" class="nav-link active"><i class="fe fe-book"></i> Libros</a>
      </li>

      @if(\Auth::user() !== null)
        <li class="nav-item">
          <a href="{{ route('bibliotecas.materiales.index', $biblioteca_id) }}" class="nav-link active"><i class="fe fe-scissors"></i> Materiales</a>
        </li>
        
        <li class="nav-item">
          <a href="{{ route('bibliotecas.clientes.index', $biblioteca_id) }}" class="nav-link active"><i class="fe fe-users"></i> Clientes</a>
        </li>
      @endif
    
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
