@extends('admin.layouts.app')
@section('title', 'Inicio')
@section('css')
<link href="{!! asset('/css/admin/modal.css') !!}" rel='stylesheet' />
<link href="{!! asset('/css/admin/admin-style.css') !!}" rel='stylesheet' />


<link href="{!! asset('/css/plugins/fullcalendar-scheduler-1.9.0/lib/fullcalendar.min.css') !!}" rel='stylesheet' />
<link href="{!! asset('/css/plugins/fullcalendar-scheduler-1.9.0/lib/fullcalendar.print.min.css') !!}" rel='stylesheet'
        media='print' />
<link href="{!! asset('/css/plugins/fullcalendar-scheduler-1.9.0/scheduler.min.css') !!}" rel='stylesheet' />

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
                                                                        class=" text-success text-uppercase font-bold">{{ Auth::guard('instructor')->user()->centro->cen_desccorta }}</span>
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
                                        <div id="calendar"></div>

                                </div>
                        </div>
                </div>
        </div>


</div>
<div id="modal"></div>
@include('admin.cursos.modal')
@endsection

@section('scripts')
<script src="{!! asset('/js/admin/home/index.js') !!}" type="text/javascript"></script>


<script src="{!! asset('/js/plugins/fullcalendar-scheduler-1.9.0/lib/moment.min.js') !!}"></script>
<script src="{!! asset('/js/plugins/fullcalendar-scheduler-1.9.0/lib/jquery-ui.min.js') !!}"></script>
<script src="{!! asset('/js/plugins/fullcalendar-scheduler-1.9.0/lib/fullcalendar.min.js') !!}"></script>
<script src="{!! asset('/js/plugins/fullcalendar-scheduler-1.9.0/scheduler.min.js') !!}"></script>


<script src="{!! asset('/js/plugins/fullcalendar-3.7.0/locale/es.js') !!}"></script>
@stop