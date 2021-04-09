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

    <link href="{!! asset('css/sicenet/estilos_extra.css') !!}" rel="stylesheet" />
    <link href="{!! asset('css/sicenet/style-responsive.css') !!}" rel="stylesheet" />

</head>

<body class="gray-bg">


    <div ui-view>
        <div>
            <div class="login-cover">
                <!--div class="login-cover-image"><img src="img/ImgBckGrnd.jpg" data-id="login-cover-image" alt="" /></div-->
                <div class="login-cover-bg"></div>
            </div>

            <div class="login login-v2">

                <div class="login-content">

                    <div class="form-group m-b-20 text-center">
                        <img src="{{ asset('store/image/logos/logooficial.png') }}">
                    </div>
                    <form rol="form" class="margin-bottom-0" name="loginForm" method="POST"
                        action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control" placeholder="Email" name="email"
                                    value="{{ old('email') }}" required autofocus>


                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control" placeholder="Password"
                                    name="password" required>

                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong class="text-danger">{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
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

                        @if ($errors->has('email'))
                        <div class="alert alert-danger alert-dismissible fade show text-justify" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{ $errors->first('email') }}
                        </div>
                        @endif

                        @if(session('ok'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {!! session('ok') !!}
                        </div>
                        @endif

                        <br />
                        <a href="{{ route('password.request') }}"><small>¿Se te olvidó tu contraseña?</small></a>
                        <div class="login-buttons">
                            <button type="submit" class="btn btn-success btn-block btn-lg">INGRESAR</button>
                        </div>

                        <hr>
                        <div>
                            <br />
                            <p style="text-align: justify">Su información está protegida por la Política de privacidad y
                                manejo de datos personales del Instituto Mexicano del Seguro Social.</p>
                            <p style="text-align: justify">Los datos que usted registra en este sistema son resguardados
                                por la Coordinación de Sistemas de Información del Centro Nacional de Capacitación y
                                Calidad.</p>
                            <p style="text-align: justify">Sus datos serán utilizados para informar su participación en
                                el evento de capacitación, ante las áreas y autoridades de la Institución. También se
                                usarán para contactarlo con propósitos de capacitación exclusivamente.
                            </p>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


    <!-- Mainly scripts -->
    <script src="{!! asset('/js/jquery-3.1.1.min.js') !!}"></script>
    <script src="{!! asset('/js/bootstrap.js') !!}"></script>



    @section('scripts')
    @show
</body>

</html>