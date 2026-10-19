{{-- Source for public/images/og.png (1200×630). Regenerate with scripts/og-image.sh. --}}
<!DOCTYPE html>
<html lang="en" class="antialiased">
<head>
    <meta charset="utf-8">
    @fonts
    @vite(['resources/css/app.css'])
</head>
<body class="m-0">
    <div class="relative isolate flex h-[630px] w-[1200px] flex-col justify-center overflow-hidden bg-linear-to-br from-honey-50 via-white to-honey-100 px-24 font-sans">
        <div class="flex items-center gap-x-5">
            <img src="{{ asset('images/bear.svg') }}" alt="" class="h-20 w-auto">
            <div class="font-display text-6xl font-semibold tracking-tight text-honey-950">kimiyu <span class="font-medium text-honey-600">studio</span></div>
        </div>
        <p class="mt-8 max-w-[22ch] font-display text-6xl font-semibold tracking-tight text-balance text-honey-950">
            Small, calm apps, each with a critter inside.
        </p>
        <ul role="list" class="mt-14 flex gap-x-10">
            @foreach (config('kimiyu.apps') as $app)
                <li class="flex items-center gap-x-4">
                    <img src="{{ asset($app['icon']) }}" alt="" class="-m-2 size-24">
                    <div class="font-display text-3xl font-semibold tracking-tight text-neutral-800">{{ $app['name'] }}</div>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
