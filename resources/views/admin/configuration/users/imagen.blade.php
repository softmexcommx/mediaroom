@extends('layouts.app')

@section('title', 'Usuarios')

@section('css')
<link href="{!! asset('/css/plugins/cropper/cropper.min.css') !!}" rel='stylesheet' />
@stop

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-12">
        <h2>Mi Imagen</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('sicenet_enlinea.home') }}">Inicio</a>
            </li>
            <li class="breadcrumb-item">
                <a>Configuración</a>
            </li>
            <li class="breadcrumb-item">
                <a>Usuarios</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Imagen</strong>
            </li>
        </ol>
    </div>
</div>
<br><br>
<div class="row">

    <div class="col-md-12">

        <div class="ibox">
            <div class="ibox-title">
                <h3>Mi Imagen</h3>
            </div>
            <div class="ibox-content">


                <div class="row">


                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="image-crop">
                                    <img src="{!! asset(Auth::user()->photo) !!}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h4>Vista previa</h4>
                                <div class="img-preview img-preview-sm"></div>
                                <h4></h4>
                                <p>

                                </p>
                                <div class="btn-group">
                                    <button class="btn btn-white" id="zoomIn" type="button">Zoom In</button>
                                    <button class="btn btn-white" id="zoomOut" type="button">Zoom Out</button>
                                </div>


                                <h4></h4>
                                <p>

                                </p>
                                {!!Form::open(array('role' => 'form', 'method' => 'POST', 'files'=>true, 'id' =>
                                'FileUpload' , 'action' => array('Configuration\UserController@upload')))!!}

                                <div class="btn-group">
                                    <label title="Upload image file" for="inputImage" class="btn btn-primary">
                                        <input type="hidden" name="inputData" id="inputData">
                                        <input type="file" accept="image/*" name="inputImage" id="inputImage"
                                            class="hide">
                                        <i class="fa fa-paperclip"></i>&nbsp;Adjuntar
                                    </label>
                                    <button class="ladda-button btn btn-success pull-right" id="btnSubir"
                                        data-style="expand-left"> <i class="fa fa-upload"></i>&nbsp;Subir</button>
                                </div>


                                {!!Form::close()!!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        {!! Form::model($user,['route'=>['users.updateperfil', $user->id],'method'=>'PUT','id' =>
                        'frm-perfil']) !!}




                    </div>
                </div>

            </div>
            <div class="ibox-footer">

                <a class="btn btn-white" href="{{ route('inicio') }}"><i
                        class="fa fa-arrow-circle-o-left"></i>&nbsp;Cancelar</a>

                {!! Form::submit("Guardar",['data-style'=> 'expand-left', 'class'=>'ladda-button btn btn-success
                pull-right']) !!}
            </div>
        </div>
        {!!Form::close()!!}
    </div>

</div>

<br><br>


@endsection

@section('scripts')

<script src="{!! asset('/js/sicenet/users/jquery.imagen.js') !!}"></script>
<!-- Image cropper -->
<script src="{!! asset('/js/plugins/cropper/cropper.min.js') !!}"></script>

<script src="{!! asset('/js/sicenet/users/jquery.imagen.js') !!}" type="text/javascript"></script>

@stop