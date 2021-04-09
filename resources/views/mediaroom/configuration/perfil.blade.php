@extends('sicenet_enlinea.layouts.app')

@section('title', 'Mi Perfil')

@section('css')
<link href="{!! asset('/css/sicenet/sicenet-style.css') !!}" rel='stylesheet' />
<link href="{!! asset('/css/plugins/select2/select2.min.css') !!}" rel="stylesheet">
<link href="{!! asset('/css/sicenet/modal.css') !!}" rel='stylesheet' />
@stop

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>{{ Auth::user()->nameComplete }}</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('sicenet_enlinea.home') }}">Inicio</a>
            </li>
            <li class="breadcrumb-item">
                <a>Configuración</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Mi Perfil</strong>
            </li>
        </ol>
    </div>
</div>




<div class="wrapper wrapper-content animated fadeInRight">
    {!! Form::model($user,['route'=>['sicenet_enlinea.updateperfil', $user->usudis_cve],'method'=>'PUT','id' =>
    'frm-perfil']) !!}



    <div class="ibox ibox-sicenet">
        <div class="ibox-title">
            <h3>DATOS DE USUARIO</h3>
        </div>
        <div class="ibox-content">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputuname">Usuario</label>
                        <div class="input-group m-b"><span class="input-group-addon"><i class="fa
                                                fa-at"></i></span>
                            <span class="form-control">{{ $user->email }}</span>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputuname">WhatsApp</label>
                        <div class="input-group m-b"><span class="input-group-addon"><i class="fa
                                    fa-whatsapp"></i></span>
                            {!!Form::number('usudis_wa', $user->usudis_wa, ['class'=>'form-control', 'id' =>
                            'usudis_wa', 'maxlength'=>"10",
                            'oninput'=>"javascript: if (this.value.length > this.maxLength) this.value =
                            this.value.slice(0, this.maxLength);",
                            'placeholder'=>'WhatsApp'])!!}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputuname">Teléfono</label>
                        <div class="input-group m-b"><span class="input-group-addon"><i class="fa
                                    fa-phone"></i></span>
                            {!!Form::number('usudis_telofi', $user->usudis_telofi, ['class'=>'form-control', 'id' =>
                            'usudis_telofi', 'maxlength'=>"10",
                            'oninput'=>"javascript: if (this.value.length > this.maxLength) this.value =
                            this.value.slice(0, this.maxLength);",
                            'placeholder'=>'Teléfono'])!!}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputuname">Correo Alterno</label>
                        <div class="input-group m-b"><span class="input-group-addon"><i class="fa
                                                    fa-at"></i></span>
                            {!!Form::email('usudis_coralt', $user->usudis_coralt, ['class'=>'form-control', 'id' =>
                            'usudis_coralt',
                            'placeholder'=>'Email'])!!}
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <div class="ibox ibox-sicenet">
        <div class="ibox-title">
            <h3>DATOS GENERALES</h3>
        </div>
        <div class="ibox-content">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputuname">Matrícula</label>
                        <div class="input-group m-b"><span class="input-group-addon"><i class="fa
                                                                        fa-slack"></i></span>
                            <span class="form-control">{{ $user->data->tra_matricula }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputuname">Nombre</label>
                        <div class="input-group m-b"><span class="input-group-addon"><i class="fa
                                                                                fa-user"></i></span>
                            {!!Form::text('tra_nombre', $user->data->tra_nombre, ['class'=>'form-control',
                            'id'
                            =>
                            'tra_nombre',
                            'placeholder'=>'Nombre'])!!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputuname">Apellido Paterno</label>
                        <div class="input-group m-b"><span class="input-group-addon"><i class="fa fa-slack"></i></span>
                            {!!Form::text('tra_apepat', $user->data->tra_apepat, ['class'=>'form-control',
                            'id'
                            =>
                            'tra_apppat',
                            'placeholder'=>'Nombre'])!!}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputuname">Apellido Materno</label>
                        <div class="input-group m-b"><span class="input-group-addon"><i class="fa fa-slack"></i></span>
                            {!!Form::text('tra_apemat', $user->data->tra_apemat, ['class'=>'form-control',
                            'id'
                            =>
                            'tra_apemat',
                            'placeholder'=>'Apellido Materno'])!!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputuname">RFC</label>
                        <div class="input-group m-b"><span class="input-group-addon"><i class="fa fa-slack"></i></span>
                            {!!Form::text('tra_rfc', $user->data->tra_rfc, ['class'=>'form-control', 'id' =>
                            'tra_rfc',
                            'oninput'=>"javascript: if (this.value.length > this.maxLength) this.value =
                            this.value.slice(0, this.maxLength);",
                            'maxlength'=>"13",
                            'placeholder'=>'RFC'])!!}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputuname">CURP</label>
                        <div class="input-group m-b"><span class="input-group-addon"><i class="fa fa-slack"></i></span>
                            {!!Form::text('tra_curp', $user->data->tra_curp, ['class'=>'form-control', 'id'
                            =>
                            'tra_curp',
                            'oninput'=>"javascript: if (this.value.length > this.maxLength) this.value =
                            this.value.slice(0, this.maxLength);",
                            'maxlength'=>"18",
                            'placeholder'=>'CURP'])!!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputuname">Género</label>
                        <div class="input-group m-b">
                            {!! Form::select('tra_gencve', $generos, $user->data->tra_gencve, ['id' =>
                            'tra_gencve',
                            'name'
                            => 'tra_gencve'
                            ,'class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputuname">Grado de Estudios</label>
                        <div class="input-group m-b">
                            {!! Form::select('tra_graestcve',$estudios, $user->data->tra_graestcve, ['id' =>
                            'tra_graestcve', 'name'
                            => 'tra_graestcve'
                            ,'class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputuname">Delegación</label>
                        <div class="input-group m-b">
                            {!! Form::select('tra_delcve', $delegaciones, $user->data->tra_delcve, ['id' =>
                            'tra_delcve',
                            'name'
                            => 'tra_delcve'
                            ,'class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputuname">Contratación</label>
                        <div class="input-group m-b">
                            {!! Form::select('tra_tipcon', $contratos, $user->data->tra_tipcon, ['id' =>
                            'tra_tipcon', 'name' => 'tra_tipcon','class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputuname">Categoría</label>
                        <div class="input-group m-b">
                            {!! Form::select('tra_catcve',[$user->data->tra_catcve =>
                            $user->data->categoria->cat_descripcion],
                            $user->data->tra_catcve, ['id' => 'tra_catcve',
                            'name'
                            => 'tra_catcve'
                            ,'class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputuname">Adscripción</label>
                        <div class="input-group m-b">
                            {!! Form::select('tra_adscve',[$user->data->tra_adscve =>
                            $user->data->adscripcion->ads_descripcion],
                            $user->data->tra_adscve, ['id' =>
                            'tra_adscve', 'name'
                            => 'tra_adscve'
                            ,'class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputuname">Antiguedad Años</label>
                        <div class="input-group m-b"><span class="input-group-addon"><i class="fa fa-slack"></i></span>
                            {!!Form::number('tra_antanios', $user->data->tra_antanios,
                            ['class'=>'form-control', 'id'
                            =>
                            'tra_antanios',
                            'placeholder'=>'Años'])!!}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputuname">Antiguedad Quincenas</label>
                        <div class="input-group m-b"><span class="input-group-addon"><i class="fa fa-slack"></i></span>
                            {!!Form::number('tra_antqnas', $user->data->tra_antqnas, ['class'=>'form-control',
                            'id' =>
                            'tra_antqnas',
                            'placeholder'=>'Quincenas'])!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
    <div class="ibox">
        <div class="ibox-footer">

            <a class="btn btn-white" href="{{ route('sicenet_enlinea.home') }}"><i
                    class="fa fa-arrow-circle-o-left"></i>&nbsp;Cancelar</a>

            {!! Form::submit("Guardar",['data-style'=> 'expand-left', 'class'=>'ladda-button btn btn-primary
            pull-right']) !!}

        </div>
    </div>




    {!!Form::close()!!}



</div>





<div id="modal"></div>
@endsection

@section('scripts')

<script src="{!! asset('/js/plugins/select2/select2.full.min.js') !!}" type="text/javascript"></script>

<script src="{!! asset('/js/sicenet_enlinea/users/jquery.miperfil.js') !!}" type="text/javascript"></script>

@stop