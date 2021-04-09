@extends('layouts.app')

@section('title', 'Editar Usuario')

@section('css')
<link href="{!! asset('css/plugins/ladda/ladda-themeless.min.css') !!}"  rel="stylesheet">
<link href="{!! asset('css/plugins/validate/site-demos.css') !!}"  rel="stylesheet">
<link href="{!! asset('css/plugins/select2/select2.min.css') !!}"  rel="stylesheet">
@stop

@section('content')




<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Usuarios</h2>
        <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="{{ route('inicio') }}">Inicio</a>
            </li>
                <li class="breadcrumb-item">
                <a>Configuración</a>
            </li>
          
              <li class="breadcrumb-item">
                <a href="{{ route('users.index') }}">Usuarios</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Editar</strong>

            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
 @include('alerts.request')
    <div class="row">
        <div class="col-lg-12">
                         

       {!! Form::model($user,['route'=>['users.update', $user->id], 'method'=>'PUT','id' => 'frm-users']) !!}


            <div class="panel panel-success">
                <div class="panel-heading">
                    <h5>Editar Usuario</h5>                   
                </div>
                <div class="panel-body">
    
    

               @include('configuration.users.forms.frm')
                 
                 
                
                        </div>
                          <div class="panel-footer">
                      <a class="btn btn-white" href="{{ route('users.index') }}"><i class="fa fa-arrow-circle-o-left"></i>&nbsp;Cancelar</a>                                    
                                   
                                       {!! Form::submit("Guardar",['data-style'=> 'expand-left', 'class'=>'ladda-button btn btn-success pull-right']) !!}
                        </div>
                    </div>
                        {!!Form::close()!!}
                </div>
    </div>

</div>



@endsection

 
@section('scripts')  
 <script src="{!! asset('/js/plugins/ladda/spin.min.js') !!}" type="text/javascript"></script> 
  <script src="{!! asset('/js/plugins/ladda/ladda.min.js') !!}" type="text/javascript"></script> 
  <script src="{!! asset('/js/plugins/ladda/ladda.jquery.min.js') !!}" type="text/javascript"></script>   
  <script src="{!! asset('/js/plugins/select2/select2.full.min.js') !!}" type="text/javascript"></script>  
  <script src="{!! asset('/js/plugins/validate/jquery.validate.min.js') !!}" type="text/javascript"></script> 
  <script src="{!! asset('/js/plugins/validate/additional-methods.min.js') !!}" type="text/javascript"></script> 
  <script src="{!! asset('/js/plugins/validate/messages_es.js') !!}" type="text/javascript"></script> 
  <script src="{!! asset('/js/stratos/users/create.js') !!}" type="text/javascript"></script> 
  <script src="{!! asset('/js/plugins/jasny/jasny-bootstrap.min.js') !!}"></script>

  
@stop
