@extends('sicenet_enlinea.layouts.app')
@section('title', 'Inicio')
@section('css')
<link href="{!! asset('/css/sicenet/sicenet-style.css') !!}" rel='stylesheet' />
<link href="{!! asset('/css/sicenet/modal.css') !!}" rel='stylesheet' />
<!-- Swiper Slider CSS -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

@stop

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>AULA VIRTUAL</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('sicenet_enlinea.home') }}">Inicio</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Mi Panel</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">

    <div class="row">
        <div class="col-lg-4">
            @include('sicenet_enlinea.panels.messages',['threads' =>$threads])
        </div>
        <div class="col-lg-8">
            @if(count($cursosActivos) > 0)
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="text-bold">Continua aprendiendo, {{ Auth::guard('web')->user()->nameShort }}</h2>
                </div>
            </div>
            @endif
            <div class="row">
                <div class="col-lg-12">
                    @if(count($cursosActivos) > 0)
                    @include('sicenet_enlinea.cursos.panels.activos')
                    @else
                    @include('alerts.message',['message' => 'NO CUENTA CON CURSO ACTIVOS POR EL MOMENTO'])
                    @endif
                </div>

            </div>
            <div class="row">
                <div class="col-lg-12">
                    <hr>
                </div>
            </div>

            @if(count($cursosDisponibles->where('acc_modcve', 3)) > 0)
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="text-bold">Recomendaciones para ti en el Aula Virtual</h2>
                </div>
            </div>
            @endif
            <div class="row">
                <div class="col-lg-12">
                    @include('sicenet_enlinea.cursos.panels.recomendaciones',['cursos' =>
                    $cursosDisponibles->where('acc_modcve',3)])
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <hr>
                </div>
            </div>
            @if(count($cursosDisponibles->where('acc_modcve', 1)) > 0)
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="text-bold">Proximos cursos en tu Centro de Capacitación</h2>
                </div>
            </div>
            @endif
            <div class="row">
                <div class="col-lg-12">
                    @include('sicenet_enlinea.cursos.panels.recomendaciones',['cursos' =>
                    $cursosDisponibles->where('acc_modcve', 1)])
                </div>
            </div>
        </div>
    </div>
    <br><br><br>

</div>
<div id="modal"></div>
@include('sicenet_enlinea.cursos.modal')

@endsection

@section('scripts')
<script src="{!! asset('/js/sicenet_enlinea/home/index.js') !!}" type="text/javascript"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
@stop