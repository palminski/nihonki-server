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
    {{-- Decorative mascots, pinned to the viewport (not the page) so they stay put in their
    corners as you scroll. Negative z-index keeps them strictly behind normal-flow content
    (the text cards), so they only show through in the empty space around/behind them
    rather than covering anything. --}}
    <img src="{{ asset('images/UmeboshiChan.svg') }}" alt="" aria-hidden="true"
        class="hidden lg:block fixed bottom-0 right-0 w-[200px] xl:w-[260px] -z-10 pointer-events-none select-none">
    <img src="{{ asset('images/UmeboshiChan.svg') }}" alt="" aria-hidden="true"
        class="hidden lg:block fixed top-24 left-0 w-[200px] xl:w-[260px] rotate-180 -z-10 pointer-events-none select-none">

        @include('partials.navigation')
    @if (session('error-message'))
        <h3 style="color: red">{{ session('error-message') }}</h3>
    @endif
    <div class="p-4 lg:p-8">
        @yield('content')
    </div>


</body>

</html>
