@extends('layouts.md.app')

@section('title', 'Mensajes')

@section('css')
<link href="{!! asset('css/plugins/iCheck/custom.css') !!}"  rel="stylesheet">

<link href="{!! asset('css/plugins/summernote/summernote-bs4.css') !!}"  rel="stylesheet">
<link href="{!! asset('css/plugins/select2/select2.min.css') !!}"  rel="stylesheet">

<link href="{!! asset('css/plugins/touchspin/jquery.bootstrap-touchspin.min.css') !!}"  rel="stylesheet">
<link href="{!! asset('css/stratos/modal.css') !!}"  rel="stylesheet">
@stop

@section('content')
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
                        <li><a href="/messages"> <i class="fa fa-inbox "></i>Bandeja de Entrada<span class="label label-warning pull-right">{{ Auth::user()->newThreadsCount() }}</span> </a></li>
                        <li><a href="mailbox.html"> <i class="fa fa-envelope-o"></i> Enviados</a></li>                                                
                        <li><a href="mailbox.html"> <i class="fa fa-trash-o"></i> Eliminados</a></li>
                    </ul>                                      
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-9 animated fadeInRight">
        <div class="mail-box-header mailbox-primary">
            <div class="pull-right tooltip-demo">                             
            </div>
            <h2>
               Nuevo Mensaje
            </h2>
        </div>
            <div class="mail-box">

                <form class="form-horizontal" action="{{ route('messages.store') }}" method="post" id="frmmenssage">
                    {{ csrf_field() }}
            <div class="mail-body">

             
                    <div class="form-group"><label class="col-sm-2 control-label">Para:</label>

                        <div class="col-sm-10">                               
                            {!!Form::select('recipients[]', $users , $myUsers, ['id' => 'recipients' ,'multiple', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label">Asunto:</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="subject" placeholder="Asunto"
                            value="{{ old('subject') }}">
                        </div>
                    </div>
                

                <div class="mail-text h-200">

              
                    <textarea name="message" id="message" class="form-control">{{ old('message') }}</textarea>
                <div class="clearfix"></div>
                    </div>
                <div class="mail-body text-right tooltip-demo">
                    <a href="/messages" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Cancelar"><i class="fa fa-times"></i>&nbsp;Cancelar</a>  
                    <button type="submit" class="ladda-button btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Enviar Mensaje">Enviar&nbsp;<i class="fa fa-envelope"></i></button>                    
                    
                </div>
                <div class="clearfix"></div>

            </form>
        

    </div>
            </div>
    </div>
</div>

<div id="modal"></div>
@endsection
@section('scripts')   
    <script src="{!! asset('/js/plugins/jasny/jasny-bootstrap.min.js') !!}"></script>
    <script src="{!! asset('/js/plugins/touchspin/jquery.bootstrap-touchspin.min.js') !!}" type="text/javascript"></script> 
    <script src="{!! asset('/js/plugins/select2/select2.full.min.js') !!}" type="text/javascript"></script>  
    <script src="{!! asset('/js/plugins/summernote/summernote-bs4.js') !!}"></script> 
    <script src="{!! asset('/js/stratos/function.messages.js') !!}"></script> 
@stop

