<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">

    <meta name="application-name" content="{{ config('app.name') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('layouts.meta')
    <title>{{ $title ?? 'Exceptional websites & web application Development' }} | {{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css',
           'resources/css/main.css',
           'resources/css/style.css',
           'resources/js/app.js'
    ])
    @livewireStyles

</head>

<body class="font-sans antialiased">

    {{ $slot }}

    @livewireScripts
    @stack('scripts')
</body>

</html>
