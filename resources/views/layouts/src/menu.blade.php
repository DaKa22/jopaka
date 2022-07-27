<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled " id="side-menu">

                <li class="menu-title">ADMINISTRACIÓN</li>

                <li>
                    {{-- <a href="{{route('user.index')}}" class=" waves-effect"> --}}
                    <a href="{{ route('cliente.index') }}" class=" waves-effect">
                        <div class="d-inline-block icons-sm mr-1"><i class="uim uim-briefcase"></i></div>
                        <span>Clientes</span>
                    </a>
                </li>

                <li>
                    <a href="" class=" waves-effect">
                        {{-- <a href="{{route('tabla_estudio.index')}}" class=" waves-effect"> --}}
                        <div class="d-inline-block icons-sm mr-1"><i class="uim uim-briefcase"></i></div>
                        <span>Proveedor</span>
                    </a>
                </li>
                <li>
                    <a href="" class=" waves-effect">
                        {{-- <a href="{{route('historial_laboral.index')}}" class=" waves-effect"> --}}
                        <div class="d-inline-block icons-sm mr-1"><i class="uim uim-briefcase"></i></div>
                        <span>Producto</span>
                    </a>
                </li>
                <li>
                    <a href="" class=" waves-effect">
                        {{--  <a href="{{route('historial_laboral.index')}}" class=" waves-effect">  --}}
                        <div class="d-inline-block icons-sm mr-1"><i class="uim uim-briefcase"></i></div>
                        <span>Venta</span>
                    </a>
                </li>
            </ul>

        </div>
        <!-- Sidebar -->
    </div>
</div>
