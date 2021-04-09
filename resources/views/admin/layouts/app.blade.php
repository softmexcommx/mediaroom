<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ Config('sicenet.name') }} - @yield('title') </title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', Config('sicenet.name')) }}</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <!-- Styles -->




    <link href="{!! asset('/css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('font-awesome/css/font-awesome.css') !!}" rel="stylesheet">


    <link href="{!! asset('/css/animate.css') !!}" rel="stylesheet">
    <link href="{!! asset('/css/style.css') !!}" rel="stylesheet" />


    <link href="{!! asset('/css/plugins/ladda/ladda-themeless.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('/css/plugins/validate/site-demos.css') !!}" rel="stylesheet">



    <!-- Toastr style -->
    <link href="{!! asset('/css/plugins/toastr/toastr.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('/css/plugins/sweetalert/sweetalert.css') !!}" rel="stylesheet">
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>



    @yield('css')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>


<body class="skin-sicenet">

    <!-- Wrapper-->
    <div id="wrapper">

        <!-- Navigation -->
        @include('sicenet.layouts.navigation')

        <!-- Page wraper -->



        <div id="page-wrapper" class="gray-bg">

            <!-- Page wrapper -->
            @include('sicenet.layouts.topnavbar')

            <!-- Main view  -->
            @yield('content')


            <!-- Footer -->
            @include('layouts.footer')

        </div>
        <!-- End page wrapper-->
    </div>

    <!-- End wrapper-->


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

    <!-- jQuery UI -->
    <script src="{!! asset('/js/plugins/jquery-ui/jquery-ui.min.js') !!}"></script>

    <script src="{!! asset('/js/sicenet/function.sicenet.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('/js/plugins/ladda/spin.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('/js/plugins/ladda/spin.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('/js/plugins/ladda/ladda.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('/js/plugins/ladda/ladda.jquery.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('/js/plugins/validate/jquery.validate.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('/js/plugins/validate/additional-methods.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('/js/plugins/validate/messages_es.js') !!}" type="text/javascript"></script>


    <script src="{!! asset('/js/plugins/pwstrength/pwstrength-bootstrap.min.js') !!}"></script>
    <script src="{!! asset('/js/plugins/pwstrength/zxcvbn.js') !!}"></script>

    <script src="{!! asset('/js/plugins/fullscreen/jquery.fullscreen-min.js') !!}"></script>

    <script src="{!! asset('/js/plugins/dropzone/dropzone.js') !!}"></script>

    <!-- Toastr -->
    <script src="{!! asset('/js/plugins/toastr/toastr.min.js') !!}"></script>


    @section('scripts')
    @show
    @include('sweet::alert')
    {!! Toastr::render() !!}





    <!-- check if pusher is allowed -->
    @if(config('chatmessenger.use_pusher'))
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pusher/5.0.2/pusher.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
   
   
                
                   var pusher = new Pusher('{{ config('pusher.connections.main.auth_key') }}', {
                       cluster: '{{ config('pusher.connections.main.options.cluster') }}',
                       encrypted: true
                   });
   
   
   
                   var channel = pusher.subscribe('for_user_{{ Auth::guard("instructor")->user()->usu_cve }}');
   
                             /* ===================  notificaciones */

                             channel.bind('new-notification', function(data) {
                                // console.log(data);
                                var notif = $('#' + data.div_id);                     
                                if (notif.length) {
                                    // thread opened
        
                                    // append message to thread
                                    notif.append(data.html);
        
                                    // make sure the thread is set to read
                                   /* $.ajax({
                                        url: "/notifications/" + notif_id + "/read"
                                    });*/
                                } else {
                                    // thread not currently opened
        
                                
                                     // notify the user
                           toastr.success(data.notification, data.notif_subject,{
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                           });
        
                                    // set unread count
                                   let url = "{{ route('sicenet.notifications.unread') }}";                          
                                    $.ajax({
                                        method: 'GET',
                                        url: url,
                                        success: function(data) {                                
                                            var div = $('#unread_notificacion');
        
                                            var count = data.ntf_count;
                                            if (count == 0) {
                                                $(div).addClass('hidden');
                                            } else {
                                                $(div).text(count).removeClass('hidden');                                     
                                            }
                                        }
                                    });
                                }
                            });
               });
    </script>
    @endif



</body>

</html>