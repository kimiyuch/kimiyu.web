<!DOCTYPE html>
<html lang="en" class="bg-white antialiased motion-safe:scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'kimiyu' }}</title>
    <meta name="description" content="kimiyu is a small studio making calm, useful apps: Joey, Bilby and Wallaby.">

    @fonts

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-neutral-950">
    <div class="isolate">
        {{ $slot }}
    </div>
</body>
</html>
