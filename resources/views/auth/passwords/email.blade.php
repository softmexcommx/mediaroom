<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ Config('sicenet.name') }} | Recuperar contraseña</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">


    <link href="{!! asset('css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('font-awesome/css/font-awesome.css') !!}" rel="stylesheet">

    <!-- Toastr style -->


    <link href="{!! asset('css/animate.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/style.css') !!}" rel="stylesheet" />
</head>

<body class="gray-bg">

    <div class="passwordBox animated fadeInDown">
        <div class="row">

            <div class="col-md-12">
                <div class="ibox-content ">

                    <div class="text-center">

                        <h1 class="logo-name "><img src="{{ asset('store/image/logos/logooficial.png') }}"></h1>

                    </div>

                    <h2 class="font-bold">Se te olvidó tu contraseña</h2>

                    <p>
                        Ingrese su dirección de correo electrónico y su contraseña se restablecerá y se le enviará por
                        correo electrónico.
                    </p>

                    <div class="row">

                        <div class="col-lg-12">
                            <form class="m-t" role="form" method="POST" action="{{ route('password.update')  }}">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email" required="">
                                </div>

                                <button type="submit"
                                    class="btn btn-{{ Config('sicenet.colorBase') }} block full-width m-b">Enviar nueva
                                    contraseña</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-md-9">
                Copyright {{ Config('sicenet.name') }}
            </div>
            <div class="col-md-3 text-right">
                <small>© 2019</small>
            </div>
        </div>
    </div>

</body>

</html>