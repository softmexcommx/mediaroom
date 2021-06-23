<nav class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <a class="offcanvas-toggler visible-xs-inline" href="#"><i class="fa fa-bars"></i></a>
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main_nav"
                aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="main_nav">
            <a class="offcanvas-toggler" href="#"><i class="fa fa-bars"></i></a>
            <ul class="nav navbar-nav">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="#">Contact</a></li>
             
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<!--Offcanvas Menu-->
<div class="offcanvas_closer"></div>
<div class="offcanvas-menu">
    <a href="#" class="close-offcanvas"><i class="fa fa-remove"></i></a>
    <h3 class="sp-module-title">MEDIA ROOM</h3>
    <ul class="nav menu" id="offcanvas-inner-menu">
        <li><a href="{{ route('mediaroom.home') }}">Home</a></li>
        <li><a href="#">Contact</a></li>

    </ul>
</div>

<form id="logout-form2" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>