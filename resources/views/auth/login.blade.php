<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Kodinger">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Notaria Acevedo') }} - Panel de Administrador</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
</head>

<body>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
