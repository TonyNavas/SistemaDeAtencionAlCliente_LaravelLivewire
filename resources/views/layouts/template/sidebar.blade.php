        <!--  BEGIN SIDEBAR  -->
        <div class="sidebar-wrapper sidebar-theme">

            <nav id="sidebar">

                <div class="navbar-nav theme-brand flex-row  text-center">
                    <div class="nav-logo">
                        <div class="nav-item theme-logo">
                            <a href="./index.html">
                                <i class="fa fa-home" style="font-size: 30px"></i>
                            </a>
                        </div>
                        <div class="nav-item theme-text">
                            <a href="./index.html" class="nav-link"> Cabañas </a>
                        </div>
                    </div>
                    <div class="nav-item sidebar-toggle">
                        <div class="btn-toggle sidebarCollapse">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-left"><polyline points="11 17 6 12 11 7"></polyline><polyline points="18 17 13 12 18 7"></polyline></svg>
                        </div>
                    </div>
                </div>
                <div class="shadow-bottom"></div>
                <ul class="list-unstyled menu-categories" id="accordionExample">
                    <li class="menu">
                        <a href="#roles" data-bs-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                            <div class="">
                                <i class="fas fa-lock"></i>
                                <span>Roles</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled show" id="roles" data-bs-parent="#accordionExample">
                            <li class="{{ Request::is('admin/roles') ? 'active' : 'active' }}">
                                <a href="{{ route('roles.index') }}"> Administrar </a>
                            </li>
                            <li>
                                <a href="{{ route('roles.create') }}"> Crear roles </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu">
                        <a href="#usuarios" data-bs-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                            <div class="">
                                <i class="fas fa-users"></i>
                                <span>Usuarios</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled show" id="usuarios" data-bs-parent="#accordionExample">
                            <li class="">

                                <a href="{{ route('usuarios.index') }}">
                                    <span>
                                        <i class="fa-solid fa-user-pen"></i>
                                        Administrar
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('usuarios.create') }}">
                                    <span><i class="fa-solid fa-plus"></i>
                                        Crear usuarios
                                    </span>
                                 </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu menu-heading">
                        <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>Navegación</span></div>
                    </li>

                    <li class="menu">
                        <a href="{{ route('categories.index') }}" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <i class="fa-solid fa-grip-vertical"></i>
                                <span>Categorias</span>
                            </div>
                        </a>
                    </li>

                    <li class="menu">
                        <a href="{{ route('products.index') }}" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <i class="fa-solid fa-utensils"></i>
                                <span>Platillos</span>
                            </div>
                        </a>
                    </li>
                </ul>

            </nav>

        </div>
        <!--  END SIDEBAR  -->
