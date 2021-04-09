<div class="row border-bottom">
    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-{{ config('sicenet.btoBase') }} " href="#"><i
                    class="fa fa-bars"></i> </a>
        </div>

        <ul class="nav navbar-top-links navbar-right">


            @include('sicenet_enlinea.messages.unread-count')

            @include('sicenet_enlinea.notifications.unread-count')

            <li><a onclick="$(document).fullScreen(true)" data-toggle="tooltip" data-placement="bottom"
                    title="Pantalla Completa"><i class="fa fa-arrows-alt"></i></a></li>
            <li><a href="{{ route('logout') }}" title="Cerrar Sesión"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                        class="fa fa-sign-out"></i>{{ trans('textos.navegacion.salir') }}</a></li>

        </ul>
    </nav>
</div>


<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>