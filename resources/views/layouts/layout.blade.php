<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Kino Order')</title>
    <link rel="stylesheet" href={{ asset('assets/css/style.css') }}>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">
    @vite('resources/css/app.css')
    @vite(['resources/js/app.js'])
</head>

<body class="min-h-screen bg-fixed bg-[linear-gradient(to_top,_#050505,_#220a2e,_#2c0042)] overflow-x-hidden">
        @include('partials.navigation')
    @if (session('error-message'))
        <h3 style="color: red">{{ session('error-message') }}</h3>
    @endif
    <div class="p-4 lg:p-8">
        @yield('content')
    </div>


</body>

</html>
