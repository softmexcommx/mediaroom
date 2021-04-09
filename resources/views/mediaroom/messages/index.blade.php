@extends('layouts.md.app')

@section('title', 'Mensajes')

@section('css')
<link href="{!! asset('css/plugins/iCheck/custom.css') !!}" rel="stylesheet">

@stop

@section('content')
@include('sicenet_enlinea.messages.partials.flash')



<br>
<div class="row">
    <div class="col-lg-3">
        <div class="ibox float-e-margins">
            <div class="ibox-content mailbox-content">
                <div class="file-manager">
                    <a class="btn btn-block btn-primary compose-mail" href="/messages/create">Crear Mensaje</a>
                    <div class="space-25"></div>
                    <h5>Carpetas</h5>
                    <ul class="folder-list m-b-md" style="padding: 0">
                        <li><a href="/messages"> <i class="fa fa-inbox "></i>Bandeja de Entrada<span
                                    class="label label-warning pull-right">{{ Auth::user()->newThreadsCount() }}</span>
                            </a></li>
                        <li><a href="mailbox.html"> <i class="fa fa-envelope-o"></i> Enviados</a></li>
                        <li><a href="mailbox.html"> <i class="fa fa-trash-o"></i> Eliminados</a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-9 animated fadeInRight">
        <div class="mail-box-header">
            <h2>
                Bandeja de Entrada ({{ Auth::user()->newThreadsCount() }})
            </h2>
            <div class="mail-tools tooltip-demo m-t-md">
                <div class="btn-group pull-right">
                    <button class="btn btn-white btn-sm"><i class="fa fa-arrow-left"></i></button>
                    <button class="btn btn-white btn-sm"><i class="fa fa-arrow-right"></i></button>

                </div>
                <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="left"
                    title="Refresh inbox"><i class="fa fa-refresh"></i>&nbsp;Actualizar</button>
                <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Mark as read"><i
                        class="fa fa-eye"></i> </button>
                <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Move to trash"><i
                        class="fa fa-trash-o"></i> </button>

            </div>
        </div>
        <div class="mail-box">

            <table class="table table-hover table-mail">
                <thead>
                    <th></th>
                    <th></th>
                    <th>De</th>

                    <th>Asunto</th>
                    <th class="text-right">Fecha</th>
                </thead>
                <tbody>
                    @each('messages.partials.thread', $threads, 'thread', 'messages.partials.no-threads')
                </tbody>
            </table>
            {!! $threads->render() !!}

        </div>
    </div>
</div>

@endsection
@section('scripts')

<script src="{!! asset('/js/plugins/iCheck/icheck.min.js') !!}"></script>
@stop