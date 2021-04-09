@extends('layouts.app')

@section('title', 'Usuarios')

@section('css')



<link href="{!! asset('css/plugins/select2/select2.min.css') !!}" rel="stylesheet">

<!-- FooTable -->
<link href="{!! asset('/css/plugins/footable/footable.core.css') !!}" rel='stylesheet' />
<link href="{!! asset('/css/stratos/modal.css') !!}" rel='stylesheet' />
<link href="{!! asset('/css/plugins/vee-validate/bundle.css') !!}" rel='stylesheet' />
@stop

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-12">
        <h2>Usuarios</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('/') }}">Inicio</a>
            </li>
            <li class="breadcrumb-item">
                <a>Configuración</a>
            </li>
            <li class="breadcrumb-item">
                <a>Usuarios</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Listado</strong>
            </li>
        </ol>
    </div>
</div>
<br><br>
<div id="appUsuario">
    <div class="row">
        <div class="col-lg-6">
            <div class="ibox ibox-primary">
                <div class="ibox-content">
                   
                    <div class="input-group">
                        <input type="text" placeholder="Buscar usuario" class="form-control" name="search"
                            v-model="search">


                    </div>
                    <div class="clients-list">

                        <table class="table table-striped table-hover" id="tableUsuarios">
                            <tbody>
                                <tr v-for="item in searchUsuarios">
                                    <td class="client-avatar"><img alt="image" :src="item.photo"> </td>
                                    <td>
                                        <a href="#" v-on:click.prevent="loadUsuario(item)"
                                            class="client-link">@{{ item.name }}</a></td>
                                    <td>@{{ item.nameRol }}</td>
                                    <td class="client-status pull-right">
                                        <span class="label label-primary" v-if="item.edo == true">Activo</span>
                                        <span class="label label-danger" v-else="item.edo == false">Bloqueado</span>
                                    </td>
                                </tr>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6">
                                        <ul class="pagination pull-right"></ul>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>


                </div>
            </div>


        </div>
        <div class="col-lg-6">
            <div class="ibox ibox-primary">

                <div class="ibox-content">
                    <div class="tab-content">
                        <div id="contact-1" class="tab-pane active" v-if="id > 0">
                            <div class="row m-b-lg">
                                <div class="col-lg-4 text-center">
                                    <div class="m-b-sm">
                                        <img alt="image" class="img-circle" :src="foto" style="width: 62px">
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <a v-if="edo == true" class="btn btn-success btn-outline btn-sm"
                                        :href="'/users/' + id +'/permission'"><i
                                            class="fa fa-building-o"></i>&nbsp;Permisos</a>
                                    <a v-if="edo == true" class="btn btn-success btn-outline btn-sm"
                                        :href="'/users/edit/' + id"><i
                                            class="fa fa-pencil-square-o"></i>&nbsp;Editar</a>
                                </div>


                            </div>
                            <h3>@{{ name  }}</h3>
                            <br>
                            <div class="client-detail">
                                <div class="full-height-scroll">
                                    <ul class="list-group clear-list">
                                        <li class="list-group-item fist-item">
                                            <span class="pull-right"> @{{ perfil }} </span>
                                            Perfil
                                        </li>


                                        <li class="list-group-item fist-item">
                                            <span class="pull-right"> @{{ email }} </span>
                                            Email
                                        </li>

                                    </ul>

                                    <a v-if="edo == true" class="btn btn-danger btn-outline btn-sm btn-block"
                                        v-on:click.prevent="deleteUsuario(id)"><i
                                            class="fa fa-trash"></i>&nbsp;Bloquear</a><br>
                                    <a v-if="edo == false" class="btn btn-info btn-outline btn-sm btn-block"
                                        v-on:click.prevent="activaUsuario(id)"><i
                                            class="fa fa-check"></i>&nbsp;Desbloquear</a><br>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>



@endsection

@section('scripts')





<script src="{!! asset('/js/plugins/jasny/jasny-bootstrap.min.js') !!}"></script>


<script src="{!! asset('/js/plugins/vuejs/vee-validate.js') !!}"></script>
<script src="{!! asset('/js/plugins/vuejs/locale/es.js') !!}"></script>

<!-- FooTable -->
<script src="{!! asset('/js/plugins/footable/footable.all.min.js') !!}"></script>

<script src="{!! asset('/js/stratos/vuejs/users.vue') !!}" type="text/javascript"></script>

@stop