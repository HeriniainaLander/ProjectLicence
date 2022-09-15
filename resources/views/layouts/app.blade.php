<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="Responsive bootstrap 4 admin template" name="description" />
    <meta content="Memoire" name="Yves" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets') }}/images/favicon.ico">

    <!-- App css -->
    <link href="{{ asset('assets') }}/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
    <link href="{{ asset('assets') }}/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets') }}/css/app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
        @auth()
            <body class="left-side-menu-dark">
                <div id="app" style="background-color: #e6e6e6">
                    @include('layouts.template.auth')
                </div>
                <!-- Vendor js -->
                <script src="{{ asset('assets') }}/js/vendor.min.js"></script>

                <!-- App js -->
                <script src="{{ asset('assets') }}/js/app.min.js"></script>
                @stack('script')
            </body>
        @endauth
        @guest()
                <body style="background-color: #e6e6e6">
                    <div id="app">
                        @include('layouts.template.guest')
                    </div>

                    <!-- Plugins js-->
                    <script src="{{ asset('assets') }}/libs/simple-text-rotator/jquery.simple-text-rotator.min.js"></script>
                    <script src="{{ asset('assets') }}/libs/jquery-countdown/jquery.countdown.min.js"></script>
                    <!-- Vendor js -->
                    <script src="{{ asset('assets') }}/js/vendor.min.js"></script>
                    <!-- App js -->
                    <script src="{{ asset('assets') }}/js/app.min.js"></script>

                </body>
        @endguest
</body>
</html>
