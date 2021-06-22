<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <span>
                        <a href="#">
                            <img alt="image" class="img-circle" src="{!! asset(Auth::guard('admin')->user()->photo) !!}"
                                width="50" height="50" />
                        </a>
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear">
                            <span class="block m-t-xs"><strong class="font-bold">{!!
                                    Auth::guard('admin')->user()->nameComplete
                                    !!}</strong></span>
                            <span class="text-muted text-xs block">{{ Auth::guard('admin')->user()->nameRol }}<b
                                    class="caret"></b></span>
                        </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <!--<li><a href="#">Mi perfil</a></li>
                        <li><a href="#">Cambiar contraseña</a></li>-->
                        <li class="divider"></li>
                        <li><a href="{{ route('admin.logout') }}" title="Cerrar Sesión"
                                onclick="event.preventDefault(); document.getElementById('logout-form2').submit();">{{ trans('textos.navegacion.cerrarsesion') }}</a>
                        </li>
                    </ul>
                </div>
                <div class="logo-element">
                    {{ Config('mediaroom.iniciales') }}
                </div>
            </li>



            <li>
                <a href="{{ route('admin.home') }}"><i class="fa fa-home"></i> <span class="nav-label">INICIO</span></a>
            </li>

            <li>
                <a href="#"><i class="fa fa-users"></i> Usuarios<span
                    class="nav-label"></span></a>
              </li>


        </ul>

    </div>
</nav>



<form id="logout-form2" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>