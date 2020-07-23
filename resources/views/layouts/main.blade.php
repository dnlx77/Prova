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
                <li><a href="{{ route('ruolo.index') }}" >Ruolo</a></li>
                <li><a href="{{ route('autore.index') }}" >Autore</a></li>
                <li><a href="{{ route('titolo.index') }}" >Titolo</a></li>
                <li><a href="{{ route('editore.index') }}" >Editore</a></li>
                <li><a href="{{ route('collana.index') }}" >Collana</a></li>
            </ul>
        </div>
    </div>
    <div class="content-wrapper">  
        <div class="container"> 
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
         <strong>{{  Session::get('success') }}</strong>
        @yield('content')
        </div>
    </div>
</body>
</html>