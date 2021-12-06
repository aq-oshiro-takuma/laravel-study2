<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- feather icons -->
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>
<div id="app">
    @include('layouts.header')

    <main class="container-fluid body-wrapper">
        <div class="row">
            @auth
            @include('layouts.sidebar')
            <div class="col-md-10 ml-sm-auto p-0">
            @else
            <div class="col-md-12 ml-sm-auto p-0">
            @endauth
                <main role="main" class="px-4">
                    @yield('content')
                </main>
            </div>
        </div>
    </main>
</div>
</body>

<script>
    feather.replace()
</script>
</html>
