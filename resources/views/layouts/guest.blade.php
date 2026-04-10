<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="DGCI Admin.">
    <meta name="keywords" content="DGCI">
    <meta name="author" content="Web symphonie">
    <title>{{ config('app.name', 'Laravel') }} - Login</title>
    {{ csrf_field() }}
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,200;6..12,300;6..12,400;6..12,500;6..12,600;6..12,700;6..12,800;6..12,900;6..12,1000&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/vendors/flag-icon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/iconly-icon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bulk-style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/themify.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome-min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/css/vendors/weather-icons/weather-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('assets/css/color-1.css') }}" media="screen">
</head>

<body>
    <div class="tap-top"><i class="iconly-Arrow-Up icli"></i></div>
    <div class="loader-wrapper">
        <div class="loader">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-7 login_one_image">
                <img class="bg-img-cover bg-center" src="https://placehold.co/1090x850" alt="looginpage">
            </div>
            <div class="col-xl-5 p-0">
                <div class="login-card login-dark login-bg">
                    <div>
                        <div>
                            <a class="logo" href="#">
                                <img class="img-fluid for-light m-auto" src="https://placehold.co/120x60"
                                    alt="looginpage">
                                <img class="for-dark" src="https://placehold.co/120x60" alt="logo">
                            </a>
                        </div>
                        <div class="login-main">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('assets/js/vendors/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}" defer=""></script>
        <script src="{{ asset('assets/js/vendors/bootstrap/dist/js/popper.min.js') }}" defer=""></script>
        <script src="{{ asset('assets/js/vendors/font-awesome/fontawesome-min.js') }}"></script>
        <script src="{{ asset('assets/js/password.js') }}"></script>
        <script src="{{ asset('assets/js/script.js') }}"></script>
    </div>
</body>

</html>
