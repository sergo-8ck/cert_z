<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

    <title>@yield('title')</title>
    <meta name="keywords" content="@yield('meta_keyword')">
    <meta name="description" content="@yield('meta_description')">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/album.css') }}" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Lightbox -->
    <link href="{{ asset('dist/css/lightbox.css') }}" rel="stylesheet">

</head>
<body>
<div id="app">
    @include('layouts.header')

    @yield('content')

    <footer class="text-muted">
        <div class="container">
            <p class="float-right">
                <a href="#">Наверх</a>
            </p>
            <p>
                АНО ВНИИС ПродМаш
                <a href="https://certificate.zone/">
                    www.certificate.zone
                </a>
            </p>
        </div>
    </footer>

</div>

<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/jquery.maskedinput.min.js')}}"></script>
@yield('scripts')
</body>
</html>
