@php($email = config('kimiyu.email'))

<x-layouts.app title="Legal notice · kimiyu studio" description="Privacy and contact details for kimiyu.ch, the website of kimiyu studio.">
    <div class="absolute inset-x-0 top-0 -z-10 h-[44rem] bg-linear-to-b from-honey-50 to-white"></div>

    <x-site-header />

    <main class="mx-auto max-w-6xl px-6 pt-10 pb-24 sm:pt-16 sm:pb-32 lg:px-8">
        <p class="text-base/7 font-semibold text-honey-600">Legal notice</p>
        <h1 class="mt-2 max-w-[30ch] font-display text-4xl font-semibold tracking-tight text-balance text-honey-950 sm:text-5xl">
            The small print
        </h1>
        <p class="mt-6 max-w-[48ch] text-lg/8 text-pretty text-neutral-600">
            This page covers kimiyu.ch. Each app’s website has its own notes on that app.
        </p>

        <div class="mt-16 divide-y divide-neutral-950/5 border-t border-neutral-950/5">
            <section id="privacy" class="grid scroll-mt-8 grid-cols-1 gap-x-12 gap-y-4 py-12 sm:grid-cols-[12rem_1fr]">
                <h2 class="font-display text-2xl font-semibold tracking-tight text-honey-950">Privacy</h2>
                <div class="max-w-[65ch] space-y-4 text-base/7 text-pretty text-neutral-600">
                    <p>
                        This website doesn’t use analytics, tracking or cookies. Our host keeps the usual server logs.
                    </p>
                </div>
            </section>

            <section id="apps" class="grid scroll-mt-8 grid-cols-1 gap-x-12 gap-y-4 py-12 sm:grid-cols-[12rem_1fr]">
                <h2 class="font-display text-2xl font-semibold tracking-tight text-honey-950">The apps</h2>
                <div class="max-w-[65ch] space-y-4 text-base/7 text-pretty text-neutral-600">
                    <p>
                        Read about <a href="https://joey.kimiyu.ch/legal" class="font-medium text-honey-800 hover:text-honey-600">Joey’s legal notice</a>,
                        <a href="https://wombat.kimiyu.ch/legal" class="font-medium text-honey-800 hover:text-honey-600">Wombat’s legal notice</a>,
                        <a href="https://croc.kimiyu.ch/legal" class="font-medium text-honey-800 hover:text-honey-600">Croc’s legal notice</a>,
                        <a href="https://wuff.kimiyu.ch/legal" class="font-medium text-honey-800 hover:text-honey-600">Wuff’s legal notice</a>,
                        <a href="https://stackr.kimiyu.ch/legal" class="font-medium text-honey-800 hover:text-honey-600">Stackr’s legal notice</a>,
                        <a href="https://usverchauft.ch/datenschutz" class="font-medium text-honey-800 hover:text-honey-600">Usverchauft’s privacy policy</a>
                        and <a href="https://wallaby.kimiyu.ch/privacy" class="font-medium text-honey-800 hover:text-honey-600">Wallaby’s privacy policy</a>
                        on their websites.
                    </p>
                </div>
            </section>

            <section id="contact" class="grid scroll-mt-8 grid-cols-1 gap-x-12 gap-y-4 py-12 sm:grid-cols-[12rem_1fr]">
                <h2 class="font-display text-2xl font-semibold tracking-tight text-honey-950">Contact</h2>
                <div class="max-w-[65ch] space-y-4 text-base/7 text-pretty text-neutral-600">
                    <p>
                        kimiyu.ch, <a href="mailto:{{ $email }}" class="font-medium text-honey-800 hover:text-honey-600">{{ $email }}</a>.
                    </p>
                </div>
            </section>
        </div>
    </main>

    <x-site-footer />
</x-layouts.app>
