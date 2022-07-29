<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled " id="side-menu">

                <li class="menu-title">ADMINISTRACIÓN</li>

                <li>
                    {{-- <a href="{{route('user.index')}}" class=" waves-effect"> --}}
                    <a href="{{ route('cliente.index') }}" class=" waves-effect text-dark">
                        <div class="d-inline-block icons-sm mr-1"><i class=""><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff3600" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <circle cx="12" cy="7" r="4" />
                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                          </svg></i></div>
                        <span>Clientes</span>
                    </a>
                </li>

                <li>
                    <a href="" class=" waves-effect">
                        <a href="{{route('proveedor.index')}}" class="waves-effect text-dark">
                        <div class="d-inline-block icons-sm mr-1"><i class=""><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-building-warehouse" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff3600" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M3 21v-13l9 -4l9 4v13" />
                            <path d="M13 13h4v8h-10v-6h6" />
                            <path d="M13 21v-9a1 1 0 0 0 -1 -1h-2a1 1 0 0 0 -1 1v3" />
                          </svg></i></div>
                        <span>Proveedor</span>
                    </a>
                </li>
                <li>
                    <a href="" class=" waves-effect">
                        <a href="{{route('producto.index')}}" class=" waves-effect text-dark">
                        <div class="d-inline-block icons-sm mr-1"><i class=""><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-archive" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff3600" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <rect x="3" y="4" width="18" height="4" rx="2" />
                            <path d="M5 8v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-10" />
                            <line x1="10" y1="12" x2="14" y2="12" />
                          </svg></i></div>
                        <span>Producto</span>
                    </a>
                </li>
                {{-- <li>
                    <a href="" class=" waves-effect">
                         <a href="{{route('historial_laboral.index')}}" class=" waves-effect">
                        <div class="d-inline-block icons-sm mr-1"><i class="uim uim-briefcase"></i></div>
                        <span>Venta</span>
                    </a>
                </li> --}}
            </ul>

        </div>
        <!-- Sidebar -->
    </div>
</div>
