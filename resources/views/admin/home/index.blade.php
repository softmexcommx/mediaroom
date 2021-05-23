@extends('admin.layouts.app')
@section('title', 'Inicio')
@section('css')
<link href="{!! asset('/css/coralbeach/modal.css') !!}" rel='stylesheet' />
<link href="{!! asset('/css/coralbeach/coralbeach-style.css') !!}" rel='stylesheet' />


@stop

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
                <h2></h2>
                <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                                <a href="{{ route('admin.home') }}">Inicio</a>
                        </li>
                        <li class="breadcrumb-item active">
                                <strong>Mi Panel</strong>
                        </li>
                </ol>
        </div>
</div>
<div class="wrapper wrapper-content">

        <div class="row">
                <div class="col-lg-12">



                        <div class="ibox">
                                <div class="ibox-title">

                                        <div class="row">
                                                <div class="col-md-6">
                                                        <strong>CENTRO DE CAPACITACIÓN:</strong>
                                                        <br>
                                                        <h2><span
                                                                        class=" text-success text-uppercase font-bold">carea</span>
                                                        </h2>
                                                </div>
                                                <div class="col-md-6">
                                                        <div class="row">
                                                                <div class="col-sm-5 m-b-xs">
                                                                </div>


                                                                <div class="col-sm-7 m-b-xs">



                                                                </div>

                                                        </div>

                                                </div>
                                        </div>
                                        <div class="ibox-tools">
                                                <a class="collapse-link">
                                                        <i class="fa fa-chevron-up"></i>
                                                </a>


                                        </div>
                                </div>
                                <div class="ibox-content">
                                        

                                </div>
                        </div>
                </div>
        </div>


</div>
<div id="modal"></div>

@endsection

@section('scripts')
<script src="{!! asset('/js/admin/home/index.js') !!}" type="text/javascript"></script>
<script src="{!! asset('/js/plugins/fullcalendar-scheduler-1.9.0/lib/moment.min.js') !!}"></script>
<script src="{!! asset('/js/plugins/fullcalendar-scheduler-1.9.0/lib/jquery-ui.min.js') !!}"></script>
@stop