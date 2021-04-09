@extends('sicenet.layouts.app')

@section('title', 'Configuración')

@section('css')
<link href="{!! asset('css/plugins/select2/select2.min.css') !!}" rel="stylesheet">
<link href="{!! asset('/css/sicenet/modal.css') !!}" rel='stylesheet' />
@stop

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-12">
        <h2>Configuración</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('sicenet.home') }}">Inicio</a>
            </li>
            <li class="breadcrumb-item active">
                <a>Configuración</a>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="ibox">
        <div class="ibox-content">
            <div class="row">
                <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                    <a class="btn btn-success btn-outline btn-block" href="JavaScript:clear();"> <i
                            class="fa fa-refresh fa-3x"></i>
                        <br><br>Limpiar Cache</a>
                </div>
            </div>
        </div>
    </div>

</div>
<div id="modal"></div>
@endsection

@section('scripts')
<script src="{!! asset('/js/sicenet/configuration/index.js') !!}" type="text/javascript"></script>
@stop