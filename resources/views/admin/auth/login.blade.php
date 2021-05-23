<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ Config('sicenet.name') }} | Iniciar sesión</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">


    <link href="{!! asset('css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('font-awesome/css/font-awesome.css') !!}" rel="stylesheet">

    <!-- Toastr style -->


    <link href="{!! asset('css/animate.css') !!}" rel="stylesheet">
    <link id="loadBefore" href="{!! asset('css/style.css') !!}" rel="stylesheet" />

    <link href="{!! asset('css/coralbeach/estilos_extra.css') !!}" rel="stylesheet" />
    <link href="{!! asset('css/coralbeach/style-responsive.css') !!}" rel="stylesheet" />

</head>

<body class="gray-bg">


    <div ui-view>
        <div>
            <div class="login-cover">
                <!--div class="login-cover-image"><img src="img/ImgBckGrnd.jpg" data-id="login-cover-image" alt="" /></div-->
                <div class="login-cover-bg"></div>
            </div>

            <div class="login login-v2" data-pageload-addclass="animated fadeIn">

                <div class="login-content">

                    <div class="form-group m-b-20 text-center">
                        <img src="{{ asset('store/image/logos/logo.png') }}" width="90%">
                    </div>
                    <form rol="form" class="margin-bottom-0" name="loginForm" method="POST"
                        action="{{ route('admin.login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control" placeholder="Email" name="email"
                                    value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                <span class="help-block" style="color:red;">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control" placeholder="Password"
                                    name="password" required>

                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{session('error')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif

                        <br />
                        <a href="#"><small>¿Se te olvidó tu contraseña?</small></a>
                        <div class="login-buttons">
                            <button type="submit" class="btn btn-coral btn-block btn-lg">INGRESAR</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


    <!-- Mainly scripts -->
    <script src="{!! asset('/js/jquery-3.1.1.min.js') !!}"></script>
    <script src="{!! asset('/js/popper.min.js') !!}"></script>
    <script src="{!! asset('/js/bootstrap.js') !!}"></script>
    <script src="{!! asset('/js/plugins/vuejs/vue.js') !!}"></script>
    <script src="{!! asset('/js/plugins/vuejs/axios.js') !!}"></script>
    <script src="{!! asset('/js/plugins/metisMenu/jquery.metisMenu.js') !!}"></script>
    <script src="{!! asset('/js/plugins/slimscroll/jquery.slimscroll.min.js') !!}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{!! asset('/js/inspinia.js') !!}"></script>
    <script src="{!! asset('/js/plugins/pace/pace.min.js') !!}"></script>

    @section('scripts')
    @show
</body>

</html>