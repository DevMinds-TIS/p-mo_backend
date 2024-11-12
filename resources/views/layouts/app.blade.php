<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi Proyecto Laravel')</title>
</head>

<body>
    <div class="container">
        @yield('content')
    </div>
</body>

</html>