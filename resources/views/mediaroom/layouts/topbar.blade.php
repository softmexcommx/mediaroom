<section class="row top_bar">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <a href="{{ route('mediaroom.home') }}" class="logo"><img src="{!! asset('store/image/logos/logo.png') !!}"
                        alt=""></a>
            </div>
            <div class="col-sm-9 hidden-xs contact-inner">
                <ul class="sp-contact-info nav">
                   
                    <li class="sp-contact-phone">
                        <i class="fa fa-user"></i>
                        <p class="contact-content">
                            <span class="contact-title">{!! Auth::user()->name !!}</span>
                           <span> <a class="contact-title" href="#">Profile</a> |  <a href="#" class="contact-title" onclick="event.preventDefault(); document.getElementById('logout-form2').submit();">Sign out</a></span>
                        </p>
                    </li>
                   
                </ul>
            </div>
        </div>
    </div>
</section>