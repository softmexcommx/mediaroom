@extends('sicenet.layouts.app')

@section('title', 'Usuarios')

@section('css')
<link href="{!! asset('css/plugins/select2/select2.min.css') !!}" rel="stylesheet">
<link href="{!! asset('/css/stratos/modal.css') !!}" rel='stylesheet' />
@stop

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-12">
        <h2>INSTRUCTORES</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('sicenet.home') }}">Inicio</a>
            </li>
            <li class="breadcrumb-item">
                <a>Configuración</a>
            </li>
            <li class="breadcrumb-item active">
                <a>Instructores</a>
            </li>

        </ol>
    </div>
</div>
<div class="wrapper wrapper-content" id="app-instructores">
    <div class="row">
        @foreach($instructores as $instructor)
        <div class="col-lg-4">
            <div class="contact-box">
                <a class="row" href="#">
                    <div class="col-4">
                        <div class="text-center">
                            <img alt="image" class="rounded-circle m-t-xs img-fluid"
                                src="{!! asset($instructor->photo) !!}">
                            <div class="m-t-xs font-bold">Instructor</div>
                        </div>
                    </div>
                    <div class="col-8">
                        <h3><strong>{{ $instructor->nameComplete }}</strong></h3>
                        <p>{{  $instructor->data->tra_mail }}</p>

                    </div>
                </a>


            </div>
        </div>
        @endforeach
    </div>




</div>



@endsection

@section('scripts')


@stop