<div class="col-lg order-lg-first">
                <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                  <li class="nav-item">
                    <a href="{{ route('inicio') }}" class="nav-link active"><i class="fe fe-home"></i> Inicio</a>
                  </li>
                  <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-book"></i> Bibliotecas</a>
                    <div class="dropdown-menu dropdown-menu-arrow">
                      <a href="{{ route('bibliotecas.index') }}" class="dropdown-item ">Inicio</a>
                      <a href="{{ route('bibliotecas.create') }}" class="dropdown-item ">Crear</a>
                      
                      <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-book-open"></i> Libros</a>
                      <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                        <a href="{{ route('libros.index') }}" class="dropdown-item dropdown-item-right">Inicio L</a>
                        <a href="{{ route('libros.create') }}" class="dropdown-item dropdown-item-right">Crear L</a>
                      </div>
                  
                      <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-paperclip"></i> Materiales</a>
                      <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                        <a href="{{ route('materiales.index') }}" class="dropdown-item dropdown-item-right">Inicio M</a>
                        <a href="{{ route('materiales.create') }}" class="dropdown-item dropdown-item-right">Crear M</a>
                      </div>

                    </div>
                  </li>
                  <li class="nav-item dropdown">
                    <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-calendar"></i> Empleado</a>
                    <div class="dropdown-menu dropdown-menu-arrow">
                      <a href="./maps.html" class="dropdown-item ">Inicio</a>
                      <a href="./icons.html" class="dropdown-item ">Agregar</a>
                      <a href="./store.html" class="dropdown-item ">Editar</a>
                      <a href="./blog.html" class="dropdown-item ">Eliminar</a>
                      <a href="./carousel.html" class="dropdown-item ">Carrousel</a>
                    </div>
                  </li>
                  <li class="nav-item dropdown">
                    <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-file"></i> Pages</a>
                    <div class="dropdown-menu dropdown-menu-arrow">
                      <a href="./profile.html" class="dropdown-item ">Profile</a>
                      <a href="./login.html" class="dropdown-item ">Login</a>
                      <a href="./register.html" class="dropdown-item ">Register</a>
                      <a href="./forgot-password.html" class="dropdown-item ">Forgot password</a>
                      <a href="./400.html" class="dropdown-item ">400 error</a>
                      <a href="./401.html" class="dropdown-item ">401 error</a>
                      <a href="./403.html" class="dropdown-item ">403 error</a>
                      <a href="./404.html" class="dropdown-item ">404 error</a>
                      <a href="./500.html" class="dropdown-item ">500 error</a>
                      <a href="./503.html" class="dropdown-item ">503 error</a>
                      <a href="./email.html" class="dropdown-item ">Email</a>
                      <a href="./empty.html" class="dropdown-item ">Empty page</a>
                      <a href="./rtl.html" class="dropdown-item ">RTL mode</a>
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