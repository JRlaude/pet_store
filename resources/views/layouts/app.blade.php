<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts.head')

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-white navbar-light sticky-top shadow-sm" >
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/greenlogo.png" width="35" alt="">
                    <span class="h4 align-middle"> {{ config('app.name', 'Pet Store') }}</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @include('layouts.navbar.left-side')

                    </ul>

                    <!-- Right Side Of Navbar -->
                    @include('layouts.navbar.right-side')
                </div>
            </div>
        </nav>


        <main class="py-4">
            @yield('content')
        </main>
    </div>

    @include('layouts.script')
</body>
</html>