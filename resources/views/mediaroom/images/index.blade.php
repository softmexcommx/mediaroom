@extends('mediaroom.layouts.app')

@section('css')
<link href="{!! asset('/css/coralbeach/coralbeach-style.css') !!}" rel='stylesheet' />
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

<section class="sp-main-body">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 blog-area">
               

    <!--Grid row-->
    <div class="row text-center">
        <!--Grid column-->
        <div class="col-md-4">
          <h4 >With shadow</h4>
          <img class="circle z-depth-2"  src="https://mdbootstrap.com/img/Photos/Avatars/img%20(31).jpg"
            data-holder-rendered="true">
        </div>
        <!--Grid column-->
         <!--Grid column-->
         <div class="col-md-4">
            <h4>With shadow</h4>
            <img class="circle z-depth-2"  src="https://mdbootstrap.com/img/Photos/Avatars/img%20(31).jpg"
              data-holder-rendered="true">
          </div>
          <!--Grid column-->
           <!--Grid column-->
         <div class="col-md-4">
            <h4>With shadow</h4>
            <img class="circle z-depth-2"  src="https://mdbootstrap.com/img/Photos/Avatars/img%20(31).jpg"
              data-holder-rendered="true">
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