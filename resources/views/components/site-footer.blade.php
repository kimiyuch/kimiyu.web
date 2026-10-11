<footer class="border-t border-neutral-950/5">
    <div class="mx-auto flex max-w-6xl flex-col gap-6 px-6 py-10 sm:flex-row sm:items-center sm:justify-between lg:px-8">
        <div class="flex items-center gap-x-2.5">
            <img src="{{ asset('images/bear.svg') }}" alt="" class="h-6 w-auto">
            <p class="text-sm/6 text-neutral-600">kimiyu.ch, made with <span aria-label="love">❤️</span> and a few critters</p>
        </div>
        <nav class="flex flex-wrap gap-x-6 gap-y-2 whitespace-nowrap">
            <a href="/#apps" class="text-sm/6 font-normal text-neutral-600 hover:text-honey-700">Apps</a>
            <a href="{{ config('kimiyu.github_url') }}" class="text-sm/6 font-normal text-neutral-600 hover:text-honey-700">GitHub</a>
            <a href="mailto:{{ config('kimiyu.email') }}" class="text-sm/6 font-normal text-neutral-600 hover:text-honey-700">Contact</a>
            <a href="/legal" class="text-sm/6 font-normal text-neutral-600 hover:text-honey-700">Legal</a>
        </nav>
    </div>
</footer>
