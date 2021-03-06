@extends('mediaroom.layouts.app')
@section('css')
<link href="{!! asset('/css/coralbeach/coralbeach-style.css') !!}" rel='stylesheet' />
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
@stop
@section('content')
<!--page-cover   -->
<section class="sp-page-title row">
    <div class="container">
        <h2>images</h2>
        <ol class="breadcrumb">
            <li><span>You are here: &nbsp;</span></li>
            <li><a href="{{ route('mediaroom.home') }}" class="pathway" target="_parent">Home</a></li>
            <li class="active">images</li>
        </ol>
    </div>
</section>
<section class="sp-main-body" id="app-images">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 blog-area">
               

                <!--Grid row-->
                <div class="row">
                    <!--Grid column-->
                    <div class="col-md-3" v-for="area in areas">
                    <h6 >@{{ area.nameArea }}</h6>
                    <a :href="'/mediaroom/images/' + area.idArea +'/area'"><img class="circle-img z-depth-2"  :src="area.thumbnail"
                        data-holder-rendered="true"></a>
                    </div>
                    <!--Grid column-->
                    
                
                </div>
                <!--Grid row-->

            </div>
            <div class="col-sm-4 blog-area">
                <div class="column">
                   
                    <div class="module ">
                        <h3 class="module-title">Catagories</h3>
                        <div class="module-content">
                            <ul class="categories-module">
                                @foreach ($categories as $item)
                                <li>
                                    <a href="{{ route('mediaroom.images.index',['idCategory' => $item->idCategory ]) }}">
                                        <span class="ti-arrow-right"></span> {{ $item->nameCategory }} ( {{ count($item->areas)  }} )
                                    </a>

                                </li>
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
<script src="{!! asset('/vue/mediaroom/images.vue') !!}" type="text/javascript"></script>
@stop