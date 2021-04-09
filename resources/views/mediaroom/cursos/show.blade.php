@extends('sicenet_enlinea.layouts.app')
@section('title', $curso->accion->ue->ue_descripcion )
@section('css')
<link href="{!! asset('/css/sicenet/modal.css') !!}" rel='stylesheet' />
<link href="{!! asset('/css/sicenet/sicenet-style.css') !!}" rel='stylesheet' />
<link href="{!! asset('/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css') !!}" rel='stylesheet' />

<link rel='stylesheet' type="text/css" href="{!! asset('/js/plugins/audioplayer/audioplayer.css') !!}" />

@stop

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>{{ $curso->accion->ue->ue_descripcion }} - <small><i class="fa fa-calendar"></i> Del
                {{ \Carbon\Carbon::parse($curso->accion->acc_fecini)->format('d-m-Y')  }} al
                {{ \Carbon\Carbon::parse($curso->accion->acc_fecfin)->format('d-m-Y')  }}</small></h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('sicenet_enlinea.home') }}">Inicio</a>
            </li>
            <li class="breadcrumb-item">
                <a>Mis cursos</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Detalles de curso</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">

                <div class="ibox-content">
                    <div class="row">
                        <div class="col-md-6">


                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">

                                        @include('sicenet_enlinea.cursos.panels.md',['url' =>
                                        $curso->accion->ue->ue_video, 'tipo' =>
                                        1])
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                                    data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                                    data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <h2 class="m-b-sm"><strong>{{ $curso->accion->ue->ue_descripcion }}</strong>
                            </h2>
                            <h4>Detalles del curso</h4>
                            <p>{!! $curso->accion->ue->ue_descripcion_larga !!}</p>
                            <h3>Objetivo General</h3>
                            {!! $curso->accion->ue->ue_objetivo !!}
                            <h3>Nivel</h3>
                            <p>{{ $curso->accion->ue->ue_nivel }}</p>

                            <small class="float-right">{{ $porcent }}%</small>
                            <h3>Progreso actual</h3>

                            <div class="progress">
                                <div class="progress-bar progress-bar-success" style="width: {{ $porcent }}%"
                                    role="progressbar" aria-valuenow="{{ $porcent }}" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-7">

            <div id="contentTema">

            </div>

        </div>
        <div class="col-lg-5">
            <div class="ibox ibox-sicenet">
                <div class="ibox-title">
                    CONTENIDO DEL CURSO
                </div>
                <div class="ibox-content">
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion"
                                        href="#collapsePresentacion">PRESENTACIÓN</a>
                                </h5>
                            </div>
                            <div id="collapsePresentacion" class="panel-collapse collapse show">
                                <div class="panel-body">
                                    <a href="JavaScript:loadPresentacion()"
                                        class="btn btn-success btn-circle text-white">{!!
                                        HStatus::TemaIcon(1)
                                        !!}</i></a>

                                    PRESENTACIÓN DEL DOCENTE
                                </div>
                            </div>
                        </div>
                        @foreach($modulos as $item)
                        <div class="panel panel-sicenet">
                            <div class="panel-heading">
                                <h5 class="panel-title ">
                                    <a data-toggle="collapse" data-parent="#accordion"
                                        href="#collapse{{ $item->uemo_cve  }}">{{ Str::upper($item->modulo->modul_descripcion) }}</a>
                                </h5>
                            </div>
                            <div id="collapse{{ $item->uemo_cve  }}" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover">
                                            <tbody>
                                                @foreach($curso->avaTemasModulo($item->uemo_modulcve) as
                                                $itemT)
                                                <tr class="list-group-item">
                                                    <td>

                                                        <div data-toggle="tooltip" data-placement="bottom"
                                                            title="{{ $itemT->tema->tema_detalle }}">
                                                            <a href="JavaScript:loadTema('{{ $itemT->tema->tema_cve  }}', '{{ $itemT->avatem_cve  }}', true)"
                                                                class="btn btn-success btn-circle text-white">{!!
                                                                HStatus::TemaIcon($itemT->tema->tema_tipmdcve)
                                                                !!}</i></a>

                                                            {{ Str::upper($itemT->tema->tema_descripcion) }}


                                                        </div>

                                                        <br>

                                                        <div class="m-t-sm form-inline">

                                                            <div class="form-group m-l-md">
                                                                <div
                                                                    class="form-check abc-checkbox abc-checkbox-info abc-checkbox-circle">
                                                                    <input class="form-check-input"
                                                                        id="{{ $itemT->avatem_cve }}" type="checkbox"
                                                                        {{  ($itemT->avatem_visto == true ? ' checked' : '') }}
                                                                        onclick='handleClick(this);'>
                                                                    <label class="form-check-label"
                                                                        for="{{ $itemT->avatem_cve }}">
                                                                        Visto
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group m-l-md">
                                                                <div
                                                                    class="form-check abc-checkbox abc-checkbox-info abc-checkbox-circle">
                                                                    <input class="form-check-input" disabled
                                                                        id="{{ $itemT->avatem_cve }}" type="checkbox"
                                                                        {{  ($itemT->avatem_confirm == true ? ' checked' : '') }}>
                                                                    <label class="form-check-label"
                                                                        for="{{ $itemT->avatem_cve }}">
                                                                        Verificado
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <div class="form-group m-l-md">
                                                                <span>Calif:&nbsp;{{ $itemT->avatem_calif }}</span>
                                                            </div>

                                                            <div class="form-group m-l-md">
                                                                <span>Puntos:&nbsp;{{ $itemT->avatem_puntos }}</span>
                                                            </div>


                                                        </div>


                                                    </td>

                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>

            </div>

        </div>
    </div>

</div>
<div id="modal"></div>

@endsection

@section('scripts')
<script src="{!! asset('/js/plugins/pdfjs/pdf.js') !!}"></script>
<script src="{!! asset('/js/sicenet_enlinea/cursos/show.js') !!}" type="text/javascript"></script>

<script src="{!! asset('/js/plugins/audioplayer/audioplayer.js') !!}" type="text/javascript"></script>
@stop