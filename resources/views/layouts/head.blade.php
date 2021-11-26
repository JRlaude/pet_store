<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title') {{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->

    <!-- icon -->
    <link rel="icon" href="{{ asset('greenlogo.png') }}">



    <!-- Adminlte 3 -->
    <!-- font awesome -->
    <link href="{{ asset('AdminLTE-3.1.0/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    @yield('pluginscss')


    <!-- Theme Styles -->
    <link href="{{ asset('AdminLTE-3.1.0/dist/css/adminlte.min.css') }}" rel="stylesheet">
    @yield('css')

</head>