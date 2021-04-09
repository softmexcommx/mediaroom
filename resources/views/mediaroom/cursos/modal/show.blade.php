<div class="modal-header modal-header-primary">

    <h3>{{ $accion->ue->ue_descripcion }}</h3>
</div>
<div class="modal-body">

    <div class="row">
        <div class="col-md-6">
            @include('sicenet_enlinea.cursos.panels.md',['url' =>
            $accion->ue->ue_video, 'tipo' =>
            1])

        </div>
        <div class="col-md-6">
            <span class="text-muted small">
                <span>
                    Fecha
                </span>
                <h4 class="font-bold">
                    {{ \Carbon\Carbon::parse($accion->acc_fecini)->format('d-m-Y')  }} -
                    {{ \Carbon\Carbon::parse($accion->acc_fecfin)->format('d-m-Y')  }}
                </h4>

                <span>
                    Locación:
                </span>
                <h4 class="font-bold">
                    {{ $accion->centro->cen_desccorta }}
                </h4>
                <span>
                    Modalidad:
                </span>
                <h4 class="font-bold">
                    {{ $accion->modalidad->mod_descripcion }}
                </h4>
                <span>
                    Nivel:
                </span>
                <h4 class="font-bold">
                    {{ $accion->ue->ue_nivel }}
                </h4>
                <span>
                    Espacios disponibles:
                </span>
                <h4 class="font-bold">
                    {{ $accion->inscmax }}
                </h4>
            </span>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12">
            <h4>Objetivo General</h4>
            {!! $accion->ue->ue_objetivo !!}
        </div>
    </div>

</div>
<div class="modal-footer">

    <button type="button" class="btn btn-white btn-sm" data-dismiss="modal"><i
            class="fa fa-close"></i>&nbsp;Cerrar</button>
    <span class=" pull-left">
        @if($accion->inscmax > 0 && $accion->isVirtual == true && $accion->registerTime == true)
        <button onclick="registrarme('{{ $accion->acc_cve }}')" class="btn btn-success btn-sm"><i
                class="fa fa-edit"></i>&nbsp;Registrarme</a>
            @endif
    </span>
</div>