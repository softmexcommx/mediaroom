@extends('layouts.md.app')

@section('title', 'Mensajes')

@section('css')

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
        
            <div class="mail-box-header">
                    <div class="pull-right tooltip-demo">
                        <a href="{{ route('sicenet.messages.edit', [ 'id' => $thread->id ]) }}" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Responder"><i class="fa fa-reply"></i> Responder</a>                      
                        <a href="mailbox.html" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Move to trash"><i class="fa fa-trash-o"></i> </a>
                    </div>
                    <h2>
                        Mensaje
                    </h2>
                    <div class="mail-tools tooltip-demo m-t-md">
    
    
                        <h3>
                            <span class="font-normal">Asunto: </span>{{ $thread->subject }}
                        </h3>
                        <h5>
                            <span class="pull-right font-normal">{{ $thread->created_at }}</span>
                            <span class="font-normal">De: </span>{{ $thread->creator()->name }}
                        </h5>
                    </div>
                </div>
                    <div class="mail-box">        
                        <div class="mail-body">
                                <div id="thread_{{ $thread->id }}">
                                        @each('sicenet.messages.partials.messages', $thread->messages, 'message')
                                    </div>
                        </div>                                                   
                            <div class="clearfix"></div>
    
    
                    </div>
           
    </div>
</div>

<div id="modal"></div>
@endsection
@section('scripts')   
    <script src="{!! asset('/js/plugins/jasny/jasny-bootstrap.min.js') !!}"></script>
    <script src="{!! asset('/js/plugins/touchspin/jquery.bootstrap-touchspin.min.js') !!}" type="text/javascript"></script> 
    <script src="{!! asset('/js/plugins/select2/select2.full.min.js') !!}" type="text/javascript"></script>  
    <script src="{!! asset('/js/plugins/summernote/summernote.min.js') !!}"></script> 
    <script src="{!! asset('/js/sicenet/function.messages.js') !!}"></script> 
@stop

