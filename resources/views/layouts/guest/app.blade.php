<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title', 'Nyumba iitu FM · Wiigue wi Mucii')</title>

    <meta name="description" content="@yield('meta_description', 'Nyumba iitu FM is the best Kikuyu radio station streaming live on 91.5 FM in the Mt. Kenya Region and online. Tune in for music, news, and cultural shows.')">
    <meta name="keywords" content="@yield('meta_keywords', 'nyumbaiitufm, kikuyuradiostation, bestradiostation, muugithionline, kigoocoonline, kikuyu music, kenya radio')">

    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body>
    @include('layouts.guest.header')

    <main>
        @yield('content')
    </main>
    <livewire:whatsapp-widget />
    @include('layouts.guest.footer')
    <x-bottom-nav />
    @livewireScripts
</body>
</html>
