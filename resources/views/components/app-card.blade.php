@props(['app'])

@php
    // Written out in full so Tailwind finds the classes.
    $colors = [
        'gum' => ['card' => 'from-gum-50 ring-gum-950/10 hover:ring-gum-950/20', 'name' => 'text-gum-950', 'accent' => 'text-gum-700'],
        'chip' => ['card' => 'from-chip-50 ring-chip-950/10 hover:ring-chip-950/20', 'name' => 'text-chip-950', 'accent' => 'text-chip-700'],
        'lilac' => ['card' => 'from-lilac-50 ring-lilac-950/10 hover:ring-lilac-950/20', 'name' => 'text-lilac-950', 'accent' => 'text-lilac-700'],
        'burrow' => ['card' => 'from-burrow-50 ring-burrow-950/10 hover:ring-burrow-950/20', 'name' => 'text-burrow-950', 'accent' => 'text-burrow-700'],
    ][$app['color']];
    $host = parse_url($app['url'], PHP_URL_HOST);
@endphp

<a href="{{ $app['url'] }}" {{ $attributes->class(['group flex flex-col rounded-3xl bg-white bg-linear-to-b to-white to-60% p-8 ring-1', $colors['card']]) }}>
    <img src="{{ asset($app['icon']) }}" width="256" height="256" alt="{{ $app['icon_alt'] }}" class="-m-2 size-24">
    <h3 class="mt-6 font-display text-2xl font-semibold tracking-tight {{ $colors['name'] }}">{{ $app['name'] }}</h3>
    <p class="mt-1 text-lg/7 font-medium text-pretty {{ $colors['accent'] }} sm:text-base/7">{{ $app['tagline'] }}</p>
    <p class="mt-4 text-base/7 text-pretty text-neutral-600 sm:text-sm/6">{{ $app['description'] }}</p>
    <p class="mt-4 text-base/7 text-neutral-500 sm:text-sm/6">{{ $app['details'] }}</p>
    <p class="mt-auto pt-8 text-base/7 font-semibold {{ $colors['accent'] }} sm:text-sm/6">
        <span class="inline-flex items-center gap-x-1.5">
            {{ $host }}
            <x-heroicon-m-arrow-right class="size-5 shrink-0 fill-current group-hover:translate-x-0.5 motion-safe:transition-transform sm:size-4" />
        </span>
    </p>
</a>
