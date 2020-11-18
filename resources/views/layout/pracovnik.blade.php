<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="robots" content="index,follow">
    <meta name="description" content="">
    <meta name="author" content="Matej Mozola">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        {{ env('APP_NAME') }}
        @yield('title')
    </title>

    <link rel="shortcut icon" href="{{ asset('img/admin-favicon.ico') }}">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&amp;subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900&amp;subset=latin-ext" rel="stylesheet">

    <link href="{{ asset('css/style.min.css') }}" rel="stylesheet" type="text/css">
    @yield('css')

</head>
<body>

@include('frontend._partials._preloader')
<div class="main-wrapper">
    <header class="header-style8">
        @include('frontend._partials._navbar')
    </header>

    @include('frontend.pracovnik._partials._menu')
    @yield('content')

    @include('frontend._partials._footer')

</div>

@include('frontend._partials._scrolltop')

<!-- SCRIPTS -->
<script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/modernizr.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/nav-menu.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/search.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/easy.responsive.tabs.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery.counterup.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery.stellar.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/waypoints.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/tabs.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/countdown.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/isotope.pkgd.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/chart.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery.themepunch.tools.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery.themepunch.revolution.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/revolution.extension.actions.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/revolution.extension.carousel.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/revolution.extension.kenburn.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/revolution.extension.layeranimation.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/revolution.extension.migration.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/revolution.extension.navigation.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/revolution.extension.parallax.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/revolution.extension.slideanims.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/revolution.extension.video.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/map.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/main.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/script.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/addRow.js') }}" type="text/javascript"></script>

@yield('js')

</body>
</html>
