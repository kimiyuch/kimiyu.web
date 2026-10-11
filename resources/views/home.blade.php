@php
    $apps = config('kimiyu.apps');
    $email = config('kimiyu.email');

    $principles = [
        ['icon' => 'wrench-screwdriver', 'title' => 'Twenty years of web development', 'body' => 'Behind kimiyu are more than twenty years of building for the web. That experience decides what gets built, how it fits together and when it’s good enough to ship.'],
        ['icon' => 'sparkles', 'title' => 'Built mostly with Claude', 'body' => 'Most of the code is written together with Claude, Anthropic’s AI. We plan, review and test every change; Claude does much of the typing.'],
        ['icon' => 'light-bulb', 'title' => 'Ideas are cheap to try', 'body' => 'That makes building an idea quick and inexpensive. So a small app that fixes one everyday annoyance gets made, instead of staying on a list.'],
    ];
@endphp

<x-layouts.app>
    <div class="absolute inset-x-0 top-0 -z-10 h-[44rem] bg-linear-to-b from-honey-50 to-white"></div>

    <x-site-header />

    <main>
        {{-- Hero --}}
        <section class="pt-16 pb-24 sm:pt-24 sm:pb-32">
            <div class="mx-auto max-w-6xl px-6 text-center lg:px-8">
                <h1 class="mx-auto max-w-[20ch] font-display text-5xl font-semibold tracking-tight text-balance text-honey-950 sm:text-7xl">
                    Small, calm apps, each with a critter inside
                </h1>
                <p class="mx-auto mt-6 max-w-[48ch] text-lg/8 text-pretty text-neutral-600 sm:text-xl/8">
                    kimiyu is a little studio making apps that do one thing well and then get out of your way. Every one of them has an Australian animal on its icon.
                </p>
                <div class="mt-10 flex flex-wrap items-center justify-center gap-x-8 gap-y-4">
                    <a href="#apps" class="inline-flex items-center gap-x-2 rounded-full bg-honey-600 py-3 pr-4 pl-5 text-base/6 font-semibold text-white shadow-sm hover:bg-honey-700 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-honey-600">
                        Meet the apps
                        <x-heroicon-m-arrow-down class="size-5 shrink-0 fill-white" />
                    </a>
                    <a href="mailto:{{ $email }}" class="inline-flex items-center gap-x-1.5 text-base/6 font-semibold text-honey-800 hover:text-honey-600">
                        Say hello
                        <x-heroicon-m-arrow-right class="size-5 shrink-0 fill-current" />
                    </a>
                </div>
            </div>
        </section>

        {{-- Apps --}}
        <section id="apps" class="scroll-mt-8 pb-24 sm:pb-32">
            <div class="mx-auto max-w-6xl px-6 lg:px-8">
                <p class="text-base/7 font-semibold text-honey-600">The apps</p>
                <h2 class="mt-2 max-w-[30ch] font-display text-4xl font-semibold tracking-tight text-balance text-honey-950 sm:text-5xl">
                    Three critters, three small jobs
                </h2>
                <p class="mt-6 max-w-[48ch] text-lg/8 text-pretty text-neutral-600">
                    Each app has its own website, with everything you need to get started.
                </p>

                <ul role="list" class="mt-16 grid grid-cols-1 gap-8 lg:grid-cols-3">
                    @foreach ($apps as $app)
                        <li class="flex">
                            <x-app-card :app="$app" class="w-full" />
                        </li>
                    @endforeach
                </ul>

                <div class="mt-16">
                    <h3 class="font-display text-2xl font-semibold tracking-tight text-honey-950">There’s more to come</h3>
                    <p class="mt-2 max-w-[56ch] text-base/7 text-pretty text-neutral-600">
                        More critters are on the way. Have an idea of your own? Let’s build something together.
                    </p>
                    <a href="mailto:{{ $email }}?subject=An%20idea" class="mt-6 inline-flex items-center gap-x-1.5 text-base/6 font-semibold text-honey-800 hover:text-honey-600">
                        Tell us about it
                        <x-heroicon-m-arrow-right class="size-5 shrink-0 fill-current" />
                    </a>
                </div>
            </div>
        </section>

        {{-- How we work --}}
        <section id="how-we-work" class="scroll-mt-8 border-t border-neutral-950/5 py-24 sm:py-32">
            <div class="mx-auto max-w-6xl px-6 lg:px-8">
                <p class="text-base/7 font-semibold text-honey-600">How we work</p>
                <h2 class="mt-2 max-w-[30ch] font-display text-4xl font-semibold tracking-tight text-balance text-honey-950 sm:text-5xl">
                    Two decades of experience, built with Claude
                </h2>
                <p class="mt-6 max-w-[48ch] text-lg/8 text-pretty text-neutral-600">
                    Experience knows what’s worth building. AI makes building it fast. Together they turn a good idea into a finished app in days, not months.
                </p>

                <dl class="mt-16 grid grid-cols-1 gap-8 lg:grid-cols-3">
                    @foreach ($principles as $principle)
                        <div>
                            <dt class="flex items-center gap-x-3 text-lg/7 font-semibold text-honey-950 sm:text-base/7">
                                <x-dynamic-component :component="'heroicon-o-'.$principle['icon']" class="size-6 shrink-0 stroke-honey-600" />
                                {{ $principle['title'] }}
                            </dt>
                            <dd class="mt-2 text-base/7 text-pretty text-neutral-600 sm:text-sm/6">{{ $principle['body'] }}</dd>
                        </div>
                    @endforeach
                </dl>
            </div>
        </section>

        {{-- Contact --}}
        <section id="contact" class="scroll-mt-8 border-t border-neutral-950/5 py-24 sm:py-32">
            <div class="mx-auto grid max-w-6xl grid-cols-1 gap-8 px-6 lg:grid-cols-3 lg:px-8">
                <div class="lg:col-span-2">
                    <p class="text-base/7 font-semibold text-honey-600">Contact</p>
                    <h2 class="mt-2 max-w-[30ch] font-display text-4xl font-semibold tracking-tight text-balance text-honey-950 sm:text-5xl">
                        Questions, ideas or a bug to report?
                    </h2>
                    <p class="mt-6 max-w-[48ch] text-lg/8 text-pretty text-neutral-600">
                        Write to us. For Joey, you can also open an issue on GitHub.
                    </p>
                </div>
                <div class="flex flex-col justify-end gap-4 lg:items-end">
                    <a href="mailto:{{ $email }}" class="inline-flex items-center gap-x-2 self-start rounded-full bg-honey-600 py-3 pr-5 pl-4 text-base/6 font-semibold text-white shadow-sm hover:bg-honey-700 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-honey-600 lg:self-end">
                        <x-heroicon-m-envelope class="size-5 shrink-0 fill-white" />
                        {{ $email }}
                    </a>
                </div>
            </div>
        </section>
    </main>

    <x-site-footer />
</x-layouts.app>
