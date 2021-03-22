<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @yield('title')

    <meta name="theme-color" content="#3b82f6">

    <link rel="stylesheet" href="{{ asset('/css/app.css') }}" />

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Rubik:wght@400;600;700&display=swap" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    @yield('pageStyles')
</head>
<body class="bg-white font-Lato">
    @include('partials._topHeader')

    @yield('content')

    <script src="{{ asset('/js/app.js') }}"></script>
    @yield('pageScripts')
</body>
</html>
