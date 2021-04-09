<div class="ibox ibox-sicenet" id="panelTema">
    <div class="ibox-title text-center">

        <h3 class="m-b-xxs">{{ $tema->tema_descripcion }}</h3>
        <small>{{ $tema->tema_descripcion }}</small>

    </div>

</div>
<div class="tabs-container">
    <ul class="nav nav-tabs" role="tablist">
        @if($tema->tipo->tmd_cve != 3)
        <li><a class="nav-link active" data-toggle="tab" href="#tab-1">{{ $tema->tipo->tmd_descripcion }}</a></li>
        @endif
        <li><a class="nav-link" data-toggle="tab" href="#tab-2">Comentarios</a></li>
    </ul>
    <div class="tab-content">
        @if($tema->tipo->tmd_cve != 3)
        <div role="tabpanel" id="tab-1" class="tab-pane active">
            <div class="panel-body">
                @include('sicenet_enlinea.cursos.panels.md',['url' => $tema->tema_url, 'tipo' => $tema->tema_tipmdcve,
                'title' => $tema->tema_descripcion])
                <br>
                <hr>
                <h3>DESCRIPCIÓN</h3>
                <hr>
                <p>
                    {!! $tema->tema_contenido ?? '' !!}
                </p>
            </div>
        </div>
        @endif
        <div role="tabpanel" id="tab-2" class="tab-pane {{ $tema->tipo->tmd_cve == 3 ? 'active' : ''  }}">
            <div class="panel-body">
                @include('sicenet_enlinea.cursos.panels.comentario', ['comentarios' => $comentarios])
            </div>
        </div>
    </div>


</div>