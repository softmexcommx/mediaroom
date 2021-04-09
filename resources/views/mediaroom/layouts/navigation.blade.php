<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <span>
                        <a href="#">
                            <img alt="image" class="img-circle" src="{!! asset(Auth::user()->photo) !!}" width="50"
                                height="50" />
                        </a>
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear">
                            <span class="block m-t-xs"><strong class="font-bold">{!! Auth::user()->nameComplete
                                    !!}</strong></span>
                            <span class="text-muted text-xs block">PERFIL<b class="caret"></b></span>
                        </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">


                        <li><a href="{{ route('sicenet_enlinea.miperfil') }}">Mi perfil</a></li>
                        <li><a href="JavaScript:openPassword()">Cambiar contraseña</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ route('logout') }}" title="Cerrar Sesión"
                                onclick="event.preventDefault(); document.getElementById('logout-form2').submit();">{{ trans('textos.navegacion.cerrarsesion') }}</a>
                        </li>
                    </ul>
                </div>
                <div class="logo-element">
                    {{ Config('sicenet.iniciales') }}
                </div>
            </li>



            <li>
                <a href="{{ route('sicenet_enlinea.home') }}"><i class="fa fa-home"></i> <span
                        class="nav-label">INICIO</span></a>
            </li>

            <li>
                <a href="{{ route('sicenet_enlinea.cursos') }}"><i class="fa fa-desktop"></i> <span
                        class="nav-label">MIS CURSOS
                    </span></a>
            </li>

            <li>
                <a href="#"><i class="fa fa-video-camera"></i> <span class="nav-label">PROPEDÉUTICO
                    </span></a>
            </li>








        </ul>

    </div>
</nav>



<form id="logout-form2" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>