<div class="col-lg order-lg-first">
                <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                  <li class="nav-item">
                    <a href="{{ route('inicio') }}" class="nav-link active"><i class="fe fe-home"></i> Inicio</a>
                  </li>
                  <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-book"></i> Bibliotecas</a>
                    <div class="dropdown-menu dropdown-menu-arrow">
                      <a href="{{ route('bibliotecas.index') }}" class="dropdown-item ">Inicio</a>
                      @if(Auth::user() !== null) @can('permisos-admin')<a href="{{ route('bibliotecas.create') }}" class="dropdown-item ">Crear</a> @endcan @endif
                      
                      <!-- <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-book-open"></i> Libros</a>
                      <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                        <a href="{{ route('libros.index') }}" class="dropdown-item dropdown-item-right">Inicio L</a>
                        <a href="{{ route('libros.create') }}" class="dropdown-item dropdown-item-right">Crear L</a>
                      </div>

                      <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-paperclip"></i> Materiales</a>
                      <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                        <a href="{{ route('materiales.index') }}" class="dropdown-item dropdown-item-right">Inicio M</a>
                        <a href="{{ route('materiales.create') }}" class="dropdown-item dropdown-item-right">Crear M</a>
                      </div> -->
                      
                    </div>
                  </li>
                  <li class="nav-item dropdown">
                    <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-users"></i> Clientes</a>
                    <div class="dropdown-menu dropdown-menu-arrow">
                      <a href="{{ route('clientes.index') }}" class="dropdown-item ">Inicio</a>
                      @if(Auth::user() !== null) @can('permisos-admin')<a href="{{ route('clientes.create') }}" class="dropdown-item ">Agregar</a> @endcan @endif
                      <!-- <a href="./store.html" class="dropdown-item ">Editar</a>
                      <a href="./blog.html" class="dropdown-item ">Eliminar</a> -->
                      <a href="https://giphy.com/gifs/4Ej4ELEyt0Uta" class="dropdown-item ">Carrousel</a>
                    </div>
                  </li>
                  <li class="nav-item dropdown">
                    <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-user"></i> Empleados</a>
                    <div class="dropdown-menu dropdown-menu-arrow">
                      <a href="{{ route('empleados.index') }}" class="dropdown-item ">Inicio</a>
                      @if(Auth::user() !== null) @can('permisos-admin') <a href="{{ route('empleados.create') }}" class="dropdown-item ">Registrar</a> @endcan @endif
                      
                    </div>
                  </li>
                <!--  <li class="nav-item dropdown">
                    <a href="./form-elements.html" class="nav-link"><i class="fe fe-check-square"></i> Forms</a>
                  </li>
                  <li class="nav-item">
                    <a href="./gallery.html" class="nav-link"><i class="fe fe-image"></i> Gallery</a>
                  </li>
                  <li class="nav-item">
                    <a href="./docs/index.html" class="nav-link"><i class="fe fe-file-text"></i> Documentation</a>
                  </li>-->
                </ul>
              </div>