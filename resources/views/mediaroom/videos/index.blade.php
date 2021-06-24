@extends('mediaroom.layouts.app')
@section('css')
<link href="{!! asset('/css/coralbeach/coralbeach-style.css') !!}" rel='stylesheet' />

@stop
@section('content')
<!--page-cover   -->
<section class="sp-page-title row">
    <div class="container">
        <h2>videos</h2>
        <ol class="breadcrumb">
            <li><span>You are here: &nbsp;</span></li>
            <li><a href="{{ route('mediaroom.home') }}" class="pathway" target="_parent">Home</a></li>
            <li class="active">videos</li>
        </ol>
    </div>
</section>
<section class="sp-main-body" id="app-videos">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 blog-area">
               

                <!--Grid row-->
                <div class="row text-center">
                    <!--Grid column-->
                    <div class="col-md-3" v-for="video in videos">
                    <i class="fa fa-video-camera fa-4x"></i>
                        <h6 >@{{ video.name }}</h6>
                       <a href="#" class="btn btn-primary">Download</a>
                    </div>
                    <!--Grid column-->
                    
                
                </div>
                <!--Grid row-->

            </div>
            <div class="col-sm-4 blog-area">
                <div class="column">
                   
                    <div class="module ">
                        <h3 class="module-title">Areas</h3>
                        <div class="module-content">
                            <ul class="categories-module">
                                @foreach ($categories as $item)
                                @foreach ($item->areas as $item)
                                <li>
                                    <a href="{{ route('mediaroom.videos.index',['idArea' => $item->idArea ]) }}">
                                        <span class="ti-arrow-right"></span> {{ $item->nameArea }}
                                    </a>

                                </li>
                                @endforeach
                                @endforeach
                                
                               
                            </ul>
                        </div>
                    </div>
                   
                    
                    
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
<script src="{!! asset('/vue/mediaroom/videos.vue') !!}" type="text/javascript"></script>
@stop