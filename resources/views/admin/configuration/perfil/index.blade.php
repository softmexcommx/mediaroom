@extends('layouts.app')

@section('title', 'Perfiles')

@section('css')


<!-- FooTable -->

<link href="{!! asset('/css/plugins/footable/footable.core.css') !!}" rel='stylesheet' />
<link href="{!! asset('/css/sicenet/modal.css') !!}" rel='stylesheet' />
<link href="{!! asset('/css/plugins/vee-validate/bundle.css') !!}" rel='stylesheet' />
@stop

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h2><i class="fa fa-vcard"></i>&nbsp;Perfiles </h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('/') }}">Inicio</a>
            </li>
            <li class="breadcrumb-item">
                Configuración
            </li>
            <li class="breadcrumb-item active">
                <strong>Perfiles</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content" id="appPerfiles">

    <div class="row">
        <div class="col-md-12">
            <div class="ibox ibox-primary">
                <div class="ibox-title">
                    <h3>Perfiles</h3>
                    <div class="ibox-tools">
                        @permission('roles.store')
                        <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createPerfil">
                            <i class="fa fa-plus-circle"></i>&nbsp;Nuevo perfil
                        </a>
                        @endpermission
                    </div>
                </div>
                <div class="ibox-content">




                    <table class="footable table table-stripped toggle-arrow-tiny">
                        <thead>
                            <tr>
                                <th>Action</th>
                                <th>Nombre</th>
                                <th>Slug</th>
                                <th>Descripción</th>
                                <th>Status</th>

                            </tr>
                        </thead>
                        <tbody>

                            <tr v-for="item in perfiles">
                                <td>
                                    <div class='btn-group'>
                                        <button data-toggle='dropdown' class='btn btn-default btn-sm dropdown-toggle'><i
                                                class='fa fa-cogs'></i></button>
                                        <ul class='dropdown-menu'>
                                            <li v-if="item.edo == true"><a
                                                    :href="'/roles/' + item.id + '/permissions'"><i
                                                        class='fa fa-building-o'></i>&nbsp;Permisos</a></li>
                                            <li v-if="item.edo == true" class='divider'></li>
                                            <li v-if="item.edo == true"><a href=""
                                                    v-on:click.prevent="editPerfil(item)"><i
                                                        class='fa fa-pencil-square-o'></i>&nbsp;Editar</a></li>
                                            <li v-if="item.edo == true"><a href=""
                                                    v-on:click.prevent="deletePerfil(item)"><i
                                                        class='fa fa-trash'></i>&nbsp;Bloquear</a></li>
                                            <li v-else="item.edo == false"><a href=""
                                                    v-on:click.prevent="activarPerfil(item)"><i
                                                        class='fa fa-check'></i>&nbsp;Activar</a></li>
                                        </ul>
                                    </div>
                                </td>
                                <td>@{{ item.name }}</td>
                                <td>@{{ item.slug }}</td>
                                <td>@{{ item.description }}</td>
                                <td class="client-status">
                                    <span class="label label-primary" v-if="item.edo == true">Activo</span>
                                    <span class="label label-danger" v-else="item.edo == false">Bloqueado</span>
                                </td>

                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5">
                                    <ul class="pagination pull-right"></ul>
                                </td>
                            </tr>
                        </tfoot>

                    </table>

                </div>
            </div>

        </div>
    </div>

    @include('configuration.perfil.create')
    @include('configuration.perfil.edit')
</div>


@endsection

@section('scripts')
<script src="{!! asset('/js/plugins/vuejs/vue2-filters.min.js') !!}"></script>

<!-- FooTable -->
<script src="{!! asset('/js/plugins/footable/footable.all.min.js') !!}"></script>
<script src="{!! asset('/js/plugins/vuejs/vee-validate.js') !!}"></script>
<script src="{!! asset('/js/plugins/vuejs/locale/es.js') !!}"></script>
<script src="{!! asset('/js/sicenet/perfiles/index.vue') !!}" type="text/javascript"></script>


<script>
    $(document).ready(function() {

            $('.footable').footable();
            

        });

</script>
@stop