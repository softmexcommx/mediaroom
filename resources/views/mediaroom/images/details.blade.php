@extends('mediaroom.layouts.app')
@section('css')
<link href="{!! asset('/css/coralbeach/coralbeach-style.css') !!}" rel='stylesheet' />
@stop
@section('content')

 <!--page-cover   -->
 <section class="sp-page-title row">
    <div class="container">
        <h2>{{ $area->nameArea }}</h2>
        <ol class="breadcrumb">
            <li><span>You are here: &nbsp;</span></li>
            <li><a href="{{ route('mediaroom.home') }}" class="pathway" target="_parent">Home</a></li>
            <li>area</li>
            <li class="active">{{ $area->nameArea }}</li>
        </ol>
    </div>
</section>

  <!--work-main-body-->
  <section class="work-main-body">
    <div class="container">
        <div class="row">
            <div id="component" class="col-sm-12">
                <div id="simpleportfolio"
                    class="simpleportfolio sp-simpleportfolio-view-items layout-gallery-space">
                                        
                    <div class="row simpleportfolio-items" id="portfolio">
                        @foreach ($area->images as $item)
                            <div class="col-sm-4 col-xs-12 simpleportfolio-columns-3 app creative">
                                <div class="simpleportfolio-item">
                                    <img src="{{ $item['thumbnail'] }}" class="img-fluid img-thumbnail">
                                    <div class="overlay">
                                        <div class="vertical-middle">
                                            <div class="simpleportfolio-btns">
                                                <a class="test-popup-link" href="#">Hight</a>
                                                <a class="btn-view" href="#">Low</a>
                                            </div>                                            
                                        </div>
                                    </div>
                                </div>
                            </div>   
                        @endforeach
                      
                      
                    </div>
                </div>
             
            </div>
        </div>
    </div>
</section>



@endsection
@section('scripts')

@stop