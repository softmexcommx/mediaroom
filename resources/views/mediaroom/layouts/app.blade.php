<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Media Room - Coral Beach Cancún</title>

    <!--Fonts-->
    <link
        href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic'
        rel='stylesheet' type='text/css'>

    <!--Bootstrap-->
    <link rel="stylesheet" href="{!! asset('/probiz/css/bootstrap.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('/probiz/css/bootstrap-theme.min.css') !!}">
    <!--rs-css-->
    <link href="{!! asset('/probiz/vendors/rs-plugin/css/settings.css') !!}" rel="stylesheet">
    <!--Owl Carousel-->
    <link rel="stylesheet" href="{!! asset('/probiz/vendors/owl.carousel/owl.carousel.css') !!}">
    <!--Magnific Popup-->
    <link rel="stylesheet" href="{!! asset('/probiz/vendors/magnific-popup/magnific-popup.css') !!}">
    <!--Themefi Icons-->
    <link rel="stylesheet" href="{!! asset('/probiz/css/themify-icons.css') !!}">
    <!--Simple Line Icons-->
    <link rel="stylesheet" href="{!! asset('/probiz/css/simple-line-icons.css') !!}">
    <!--Font Awesome-->
    <link rel="stylesheet" href="{!! asset('/probiz/css/font-awesome.min.css') !!}">
    <!--P7-->
    <link rel="stylesheet" href="{!! asset('/probiz/css/pe-icon-7-stroke.min.css') !!}">

    <!--Theme Styles-->
    <link rel="stylesheet" href="{!! asset('/probiz/css/style.css') !!}">

    <link href="{!! asset('/css/plugins/toastr/toastr.min.css') !!}" rel="stylesheet">

    <script>
        window.Laravel = {!! json_encode([
                    'csrfToken' => csrf_token(),
                ]) !!};
    </script>
    @yield('css')

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>


<body>

    @include('mediaroom.layouts.topbar')
    <!--Navbar-->
    @include('mediaroom.layouts.navbar')

    @yield('content')

    @include('mediaroom.layouts.footer')

    <!-- Mainly scripts -->
    <script src="{!! asset('/probiz/js/jquery-2.1.4.min.js') !!}"></script>
    <script src="{!! asset('/probiz/js/bootstrap.min.js') !!}"></script>
    <script src="{!! asset('/js/plugins/vuejs/vue.js') !!}"></script>
    <script src="{!! asset('/js/plugins/vuejs/axios.js') !!}"></script>
    
    <script src="{!! asset('/probiz/vendors/magnific-popup/jquery.magnific-popup.min.js') !!}"></script>
    <script src="{!! asset('/probiz/vendors/waypoint/waypoints.min.js') !!}"></script>
    <script src="{!! asset('/probiz/vendors/couterup/jquery.counterup.min.js') !!}"></script>
    <!--RS-->
    <script src="{!! asset('/probiz/vendors/rs-plugin/js/jquery.themepunch.tools.min.js') !!}"></script>
    <!-- Revolution Slider Tools -->
    <script src="{!! asset('/probiz/vendors/rs-plugin/js/jquery.themepunch.revolution.min.js') !!}"></script>
    <!-- Revolution Slider -->

    <script src="{!! asset('/probiz/vendors/imagesloaded/imagesloaded.pkgd.min.js') !!}"></script>
    <script src="{!! asset('/probiz/vendors/isotope/isotope.min.js') !!}"></script>
    <script src="{!! asset('/probiz/js/jquery.parallax-1.1.3.js') !!}"></script>
    <script src="{!! asset('/probiz/js/theme.js') !!}"></script>

    <!-- Toastr -->
    <script src="{!! asset('/js/plugins/toastr/toastr.min.js') !!}"></script>


    @section('scripts')
    @show
    @include('sweet::alert')
    {!! Toastr::render() !!}



</body>

</html>