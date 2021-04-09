@extends('layouts.app')

@section('title', 'Permisos')

@section('css')
<!-- FooTable -->
<link href="{!! asset('/css/plugins/footable/footable.core.css') !!}" rel='stylesheet' />
<link href="{!! asset('/css/sicenet/modal.css') !!}" rel='stylesheet' />
@stop

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h2><i class="fa fa-vcard"></i>&nbsp;Permisos </h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('/') }}">Inicio</a>
            </li>
            <li class="breadcrumb-item">
                Configuración
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('roles.index') }}">Perfiles</a>
            </li>
            <li class="breadcrumb-item">
                {{ $perfil->name }}
            </li>
            <li class="breadcrumb-item active">
                <strong>Permisos</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content" id="appPermisos">

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Permisos Activos</h3>
                </div>
                <div class="panel-body">

                    <table class="footable table table-stripped toggle-arrow-tiny">
                        <thead>
                            <tr>

                                <th data-toggle="true">Nombre</th>
                                <th data-hide="all">Descripción</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr v-for="item in permisosAct">
                                <td>@{{ item.name }}</td>
                                <td>@{{ item.description }}</td>
                                <td>
                                    <a class="btn btn-danger btn-xs btn-outline"
                                        v-on:click.prevent="deletePermiso(item)"><i
                                            class="fa fa-arrow-circle-o-right fa-2x"></i></a>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3">
                                    <ul class="pagination pull-right"></ul>
                                </td>
                            </tr>
                        </tfoot>

                    </table>

                </div>
            </div>

        </div>
        <div class="col-md-6">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Permisos Disponibles</h3>
                </div>
                <div class="panel-body">

                    <table class="footable2 table table-stripped toggle-arrow-tiny">
                        <thead>
                            <tr>
                                <th>Action</th>
                                <th data-toggle="true">Nombre</th>
                                <th data-hide="all">Descripción</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item2 in permisosDisp">
                                <td>
                                    <a class="btn btn-success btn-xs btn-outline"
                                        v-on:click.prevent="addPermiso(item2)"><i
                                            class="fa fa-arrow-circle-o-left fa-2x"></i></a>
                                </td>
                                <td>@{{ item2.name }}</td>
                                <td>@{{ item2.description }}</td>

                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3">
                                    <ul class="pagination pull-right"></ul>
                                </td>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>

        </div>
    </div>


</div>


@endsection




@section('scripts')
<script src="{!! asset('/js/plugins/vuejs/vue2-filters.min.js') !!}"></script>

<!-- FooTable -->
<script src="{!! asset('/js/plugins/footable/footable.all.min.js') !!}"></script>
<script src="{!! asset('/js/stratos/perfiles/permission.vue') !!}" type="text/javascript"></script>
<script>
    $(document).ready(function() {

            $('.footable').footable();
             $('.footable2').footable();
            

        });

</script>

@stop