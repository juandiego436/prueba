<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    @yield('css')
</head>

<body>
@yield('content')
<script src="{{ asset('js/app.js') }}"></script>
@yield('scripts')
</body>
</html>
