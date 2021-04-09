@extends('sicenet_enlinea.layouts.app')
@section('title', 'Mis Cursos')
@section('css')
<link href="{!! asset('/css/sicenet/modal.css') !!}" rel='stylesheet' />
<link href="{!! asset('/css/sicenet/sicenet-style.css') !!}" rel='stylesheet' />

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
<link href="{!! asset('/css/plugins/datatables/jquery.dataTables.css') !!}" rel="stylesheet">

@stop

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>MIS CURSOS</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('sicenet_enlinea.home') }}">Inicio</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Mis cursos</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div id="contentTable">

    </div>
</div>
<div id="modal"></div>

@endsection

@section('scripts')
<script src="{!! asset('/js/sicenet_enlinea/cursos/index.js') !!}" type="text/javascript"></script>

<script type="text/javascript" language="javascript"
    src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript"
    src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" language="javascript"
    src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript"
    src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.bootstrap4.min.js"></script>
<script type="text/javascript" language="javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" language="javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" language="javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" language="javascript"
    src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script type="text/javascript" language="javascript"
    src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
<script type="text/javascript" language="javascript"
    src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.colVis.min.js"></script>
@stop