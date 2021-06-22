@extends('mediaroom.layouts.app')

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

<section class="sp-main-body">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 blog-area">
                <div class="row">
                                        
                        <div class="col-md-4 col-sm-6">
                            <div class="board-content">
                                <img class="img-responsive" src="http://placehold.it/320x245" alt="">
                                <div class="board-text">
                                    <h4>Jane Doe </h4>                                                                      
                                </div>
                            </div>                                                   
                        </div>
                     
                        @foreach(array_chunk($address, 2) as $chunk)
                        <div class="row">
                            @foreach($chunk as $add)
                                <div class="col-md-6">
                                    Some data
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                    
                </div>
            </div>
            <div class="col-sm-4 blog-area">
                <div class="column">
                   
                    <div class="module ">
                        <h3 class="module-title">Catagories</h3>
                        <div class="module-content">
                            <ul class="categories-module">
                                <li>
                                    <a href="#">
                                        <span class="ti-arrow-right"></span> Technology (1)
                                    </a>

                                </li>
                               
                            </ul>
                        </div>
                    </div>
                    <div class="module ">
                        <h3 class="module-title">Tag Cloud</h3>
                        <div class="module-content">
                            <div class="tagspopular">
                                <ul>
                                    <li><a href="#">Career</a></li>                                   
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>
</section>

@endsection