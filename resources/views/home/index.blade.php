@extends('layouts.app')

@section('content')

<!--rv-slider-->
<section class="slidercontainer row">
    <div class="rev_slider banner row m0" id="rev_slider" data-version="5.0">
        <ul>
            <li data-transition="slidehorizontal" data-delay="10000">
                <img src="{!! asset('store/image/sliders/1.jpeg') !!}" alt="" data-bgposition="center top"
                    data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="1">

            </li>

            <li data-transition=" 3dcurtain-horizontal">
                <img src="{!! asset('store/image/sliders/2.jpeg') !!}" alt="" data-bgposition="center top"
                    data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="1">

            </li>
            <li data-transition="parallaxvertical">
                <img src="{!! asset('store/image/sliders/3.jpeg') !!}" alt="" data-bgposition="center top"
                    data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="1">

            </li>
        </ul>
    </div>
</section>
<section class="sppb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-10">
                <div class="sppb-addon">
                    <h2 class="sppb-addon-title">Welcome to Media Room</h2>
                </div>
            </div>
            <div class="col-sm-2">
                <a target="_parent" href="#" class=" btn btn-success" role="button">Start now</a>
            </div>
        </div>
    </div>
</section>

<!--work-process-area-->
<section class="work-process-area">
    <div class="row">
        <div class="col-sm-4 work-01">
            <div class="work-process">
                <h2 class="work-title"><i class="fa fa-picture-o"></i></h2>
                <h3>Pictures</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer adipiscing erat eget risus
                    sollicitudin pellentesque.</p>
            </div>
        </div>
        <div class="col-sm-4 work-02">
            <div class="work-process">
                <h2 class="work-title"><i class="fa fa-file-pdf-o"></i></h2>
                <h3>Documents</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer adipiscing erat eget risus
                    sollicitudin pellentesque.</p>
            </div>
        </div>
        <div class="col-sm-4 work-03">
            <div class="work-process">
                <h2 class="work-title"><i class="fa fa-video-camera"></i></h2>
                <h3>Videos</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer adipiscing erat eget risus
                    sollicitudin pellentesque.</p>
            </div>
        </div>
    </div>
</section>
@endsection