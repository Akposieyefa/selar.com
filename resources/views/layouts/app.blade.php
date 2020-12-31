<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/_custom.css')}}">
</head>
<body class="bg-gray-100 h-screen antialiased leading-none">
    <div id="app">

        @include('layouts._partials._nav')
        @yield('content')
    </div>
        <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
