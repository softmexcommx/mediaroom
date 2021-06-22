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
                <li class="dropdown mega-dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false">Your Account</a>
                    <ul class="dropdown-menu mega-drop">


                        <li>
                            <span>login form</span>
                            <ul class="dropdown-menu">
                                <li>
                                    
                                        <form rol="form" name="login-form" id="login-form" method="POST"
                                        action="{{ route('login') }}">
                                        {{ csrf_field() }}
                                        <div id="form-login-username" class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="icon-user hasTooltip" title=""
                                                        data-original-title="Username"></i>
                                                </span>
                                                <input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required autofocus>
                                            </div>
                                        </div>
                                        <div id="form-login-password" class="form-group">
                                            <div class="controls">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="icon-lock hasTooltip" title=""
                                                            data-original-title="Password"></i>
                                                    </span>
                                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                                    @if ($errors->has('password'))
                                                    <span class="help-block">
                                                        <strong class="text-danger">{{ $errors->first('password') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        @if(session('error'))
                                        <div class="alert alert-danger alert-dismissible fade show text-justify" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            {!! session('error') !!}
                                        </div>
                                        @endif

                                        <div id="form-login-remember" class="form-group">
                                            <div class="checkbox">
                                                <input type="checkbox" id="modlgn-remember">
                                                <label for="modlgn-remember">Remember Me</label>
                                            </div>
                                        </div>

                                        <div id="form-login-submit" class="form-group">
                                            <button type="submit" class="btn btn-primary">Log in</button>
                                        </div>
                                    </form>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <span>Are you registered?</span>
                            <button class="btn btn-primary">Create Account</button>
                        </li>
                    </ul>
                </li>
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
        <li><a href="{{ route('home') }}">Home</a></li>

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                aria-expanded="false">Features</a>
            <ul class="dropdown-menu">
                <li class="dropdown dropdown-submenu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false">Template Features</a>
                    <ul class="dropdown-menu">
                        <li><a href="basic-options.html">Basic options</a></li>
                        <li><a href="module-possition.html">Module positions</a></li>
                        <li><a href="typo-settings.html">Typo Settings</a></li>
                        <li><a href="#">Blog Settings</a></li>
                        <li><a href="#">Preset options</a></li>
                    </ul>
                </li>
                <li class="dropdown dropdown-submenu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false">Pagebuilder options</a>
                    <ul class="dropdown-menu">
                        <li><a href="page-layout.html">Page layout</a></li>
                        <li><a href="addon-list.html">Addon list</a></li>
                        <li><a href="row-option.html">Row option</a></li>
                        <li><a href="#">Column Options</a></li>
                        <li><a href="#">Sample menu</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li><a href="contact.html">Contact</a></li>

    </ul>
</div>