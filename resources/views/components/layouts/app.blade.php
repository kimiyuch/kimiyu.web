@props([
    'title' => 'kimiyu studio: small, calm apps, each with a critter inside',
    'description' => 'kimiyu studio makes small, calm apps: Joey, a BitTorrent client for the Mac; Bilby, a poker tournament clock; Wallaby, a shared tab for couples and housemates; Wombat, a disk space app for the Mac; Croc, a video converter for the Mac; Usverchauft, ticket passing for FC Winterthur fans; and Wuff, a web font converter in the browser.',
])

@php
    // Built from APP_URL, so the canonical address stays the same whichever host the request came in on.
    $canonical = rtrim(config('app.url'), '/').(request()->is('/') ? '/' : '/'.request()->path());
@endphp

<!DOCTYPE html>
<html lang="en" class="bg-white antialiased motion-safe:scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <meta name="description" content="{{ $description }}">
    <link rel="canonical" href="{{ $canonical }}">

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="kimiyu studio">
    <meta property="og:title" content="{{ $title }}">
    <meta property="og:description" content="{{ $description }}">
    <meta property="og:url" content="{{ $canonical }}">
    <meta property="og:image" content="{{ asset('images/og.png') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="The kimiyu bear next to the words: Small, calm apps, each with a critter inside. Below, the icons of Joey, Bilby, Wallaby, Wombat, Croc, Usverchauft and Wuff.">
    <meta name="twitter:card" content="summary_large_image">

    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('images/favicon-96x96.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">

    {{ $head ?? '' }}

    @fonts

    @vite(['resources/css/app.css'])
</head>
<body class="font-sans text-neutral-950">
    <div class="isolate">
        {{ $slot }}
    </div>
</body>
</html>
