<div class="row border-bottom">
    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-{{ config('mediaroom.btoBase') }} " href="#"><i
                    class="fa fa-bars"></i> </a>
        </div>

        <ul class="nav navbar-top-links navbar-right">



            <li>
                <span class="m-r-sm  welcome-message">
                    CAREA
                </span>
            </li>

            <li><a onclick="$(document).fullScreen(true)" data-toggle="tooltip" data-placement="bottom"
                    title="Pantalla Completa"><i class="fa fa-arrows-alt"></i></a></li>
            <li><a href="{{ route('admin.logout') }}" title="Cerrar Sesión"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                        class="fa fa-sign-out"></i>{{ trans('textos.navegacion.salir') }}</a></li>

        </ul>
    </nav>
</div>


<form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">{{ csrf_field() }}
</form>