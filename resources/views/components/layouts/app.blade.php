<!DOCTYPE html>
<html lang="en" class="bg-white antialiased motion-safe:scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'kimiyu: small, calm apps, each with a critter inside' }}</title>
    <meta name="description" content="kimiyu is a small studio making calm, useful apps: Joey, a BitTorrent client for the Mac; Bilby, a poker tournament clock; and Wallaby, a shared tab for couples and housemates.">

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="kimiyu">
    <meta property="og:title" content="kimiyu: small, calm apps, each with a critter inside">
    <meta property="og:description" content="Joey, Bilby and Wallaby: apps that do one thing well, each with an Australian animal on the icon.">
    <meta property="og:url" content="{{ url('/') }}">

    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('images/favicon-96x96.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">

    @fonts

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-neutral-950">
    <div class="isolate">
        {{ $slot }}
    </div>
</body>
</html>
