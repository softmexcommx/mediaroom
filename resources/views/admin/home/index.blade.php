@extends('admin.layouts.app')

@section('title', 'Inicio')

@section('css')



<link href="{!! asset('css/plugins/select2/select2.min.css') !!}" rel="stylesheet">

<!-- FooTable -->
<link href="{!! asset('/css/plugins/footable/footable.core.css') !!}" rel='stylesheet' />
<link href="{!! asset('/css/coralbeach/modal.css') !!}" rel='stylesheet' />
<link href="{!! asset('/css/plugins/vee-validate/bundle.css') !!}" rel='stylesheet' />
@stop

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-12">
        <h2>Dashboard</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('/') }}">Inicio</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Panel</strong>
            </li>
        </ol>
    </div>
</div>
<br>
<div id="appPanel">
    <div class="row">
        <div class="col-lg-3">
            <div class="ibox">
                <div class="ibox-content">
                   
                    <a class="btn btn-success btn-sm text-white" data-toggle="modal" data-target="#createCategory">
                        <i class="fa fa-plus-circle"></i>&nbsp;Nueva Categoria
                    </a>
                   
                    <br> <br>
                    <div class="input-group">
                        <input type="text" placeholder="Buscar categoria" class="form-control" name="searchC"
                            v-model="searchC">


                    </div>
                    <div class="clients-list">

                        <table class="table table-striped table-hover" id="tableCategories">
                            <tbody>
                                <tr v-for="item in searchCategories">
                                    <td>
                                        <div class='btn-group'>
                                            <button data-toggle='dropdown'
                                                class='btn btn-default btn-sm dropdown-toggle'><i
                                                    class='fa fa-cogs'></i></button>
                                            <ul class='dropdown-menu'>
                                                <li v-if="item.edo == true"><a href=""
                                                        v-on:click.prevent="editCategory(item)"><i
                                                            class='fa fa-pencil-square-o'></i>&nbsp;Editar</a></li>
                                                <li v-if="item.edo == true"><a href=""
                                                        v-on:click.prevent="deleteCategory(item.idCategory)"><i
                                                            class='fa fa-trash'></i>&nbsp;Bloquear</a></li>
                                                <li v-else="item.edo == false"><a href=""
                                                        v-on:click.prevent="activarCategory(item.idCategory)"><i
                                                            class='fa fa-check'></i>&nbsp;Activar</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                    <td>@{{ item.nameCategory }}</td>
                                    
                                   
                                    <td><a href="#" v-on:click.prevent="getAreas(item.idCategory)"
                                            class="btn btn-default btn-sm"><i class="fa fa-arrow-right"></i></a></td>
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
        <div class="col-lg-3">
            <div class="ibox">
                <div class="ibox-content">
                   
                    <a v-if="idCategory > 0" class="btn btn-success btn-sm text-white" data-toggle="modal"
                        data-target="#createArea">
                        <i class="fa fa-plus-circle"></i>&nbsp;Nueva Area
                    </a>
                  
                    <br> <br>
                    <div class="input-group">
                        <input type="text" placeholder="Buscar area" class="form-control" name="search"
                            v-model="search">


                    </div>
                    <div class="clients-list">

                        <table class="table table-striped table-hover" id="tableAreas">
                            <tbody>
                                <tr v-for="item in searchAreas">
                                    <td>
                                        <div class='btn-group'>
                                            <button data-toggle='dropdown'
                                                class='btn btn-default btn-sm dropdown-toggle'><i
                                                    class='fa fa-cogs'></i></button>
                                            <ul class='dropdown-menu'>
                                                <li v-if="item.edo == true"><a href=""
                                                        v-on:click.prevent="editArea(item)"><i
                                                            class='fa fa-pencil-square-o'></i>&nbsp;Editar</a></li>
                                                <li v-if="item.edo == true"><a href="#"
                                                        v-on:click.prevent="deleteArea(item.idArea)"><i
                                                            class='fa fa-trash'></i>&nbsp;Bloquear</a></li>
                                                <li v-else="item.edo == false"><a href="#"
                                                        v-on:click.prevent="activarArea(item.idArea)"><i
                                                            class='fa fa-check'></i>&nbsp;Activar</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                    <td>@{{ item.nameArea }}</td>
                                    <td><a href="#" v-on:click.prevent="getFiles(item.idArea)"
                                        class="btn btn-default btn-sm"><i class="fa fa-arrow-right"></i></a></td>
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
                <div class="ibox">
                        <div class="ibox-content">

                        </div>
                </div>
        </div>

    </div>
    @include('admin.catalogs.categories.create')
    @include('admin.catalogs.categories.edit')
    @include('admin.catalogs.areas.create')
    @include('admin.catalogs.areas.edit')
</div>
@endsection

@section('scripts')





<script src="{!! asset('/js/plugins/jasny/jasny-bootstrap.min.js') !!}"></script>


<script src="{!! asset('/js/plugins/vuejs/vee-validate.js') !!}"></script>
<script src="{!! asset('/js/plugins/vuejs/locale/es.js') !!}"></script>

<!-- FooTable -->
<script src="{!! asset('/js/plugins/footable/footable.all.min.js') !!}"></script>

<script src="{!! asset('/vue/mediaroom/panel.vue') !!}" type="text/javascript"></script>

@stop