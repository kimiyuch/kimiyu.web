<header class="mx-auto flex max-w-6xl items-center justify-between gap-x-6 px-6 py-5 lg:px-8">
    <a href="/" aria-label="Homepage" class="flex items-center gap-x-2.5">
        <img src="{{ asset('images/bear.svg') }}" alt="" class="h-7 w-auto">
        <span class="font-display text-xl font-semibold text-honey-950">kimiyu</span>
    </a>
    <nav class="flex items-center gap-x-8">
        <a href="/#apps" class="text-sm/6 font-medium text-neutral-700 hover:text-honey-700 max-sm:hidden">Apps</a>
        <a href="/#contact" class="text-sm/6 font-medium text-neutral-700 hover:text-honey-700 max-sm:hidden">Contact</a>
        <a href="{{ config('kimiyu.github_url') }}" class="rounded-full px-3 py-1.5 text-sm/6 font-medium text-honey-800 ring-1 ring-honey-950/10 hover:bg-honey-50">GitHub</a>
    </nav>
</header>
