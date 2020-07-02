<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <header class="container-fluid"></header>
    <div class="menu-container-wrapper">
        <div class="container">
            <ul class="main-menu">
                <li><a href="{{ route('fumetti.index') }}" >Fumetti</a></li>
                <li><a href="{{ route('ruolo.index') }}" >Ruoli</a></li>
            </ul>
        </div>
    </div>
    <div class="content-wrapper">   
         <strong>{{  Session::get('success') }}</strong>
        @yield('content')
    </div>
</body>
</html>