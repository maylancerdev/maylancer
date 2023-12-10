<section class="py-20 overflow-hidden bg-amber-100 md:py-28 lg:py-32">
    <!-- Container -->
    <div
        class="relative items-center max-w-screen-xl px-4 mx-auto sm:px-6 md:grid md:grid-cols-12 md:gap-12 lg:px-8"
    >
        <!-- Content -->
        <div class="max-w-lg mx-auto md:col-span-6 md:mx-0 lg:pr-12">
            <h3
                class="font-semibold leading-tight md:text-left sm:leading-tight text-4xl text-center text-slate-900"
            >
                Subscribe for Updates
            </h3>
            <p
                class="mt-6 text-center text-[17px] leading-relaxed text-slate-700 sm:text-lg sm:leading-relaxed md:text-left"
            >
                Get the latest news on {{ config('app.name') }} products and promotions.
                No spam, just a few emails per year.
            </p>
            <livewire:newsletter.subscribe />
        </div>

        <!-- Images -->
        <div class="hidden grid-cols-12 col-span-6 md:grid">
            <img
                src="{{ asset('images/stock/robot-2.jpeg') }}"
                class="w-full h-auto col-span-5 my-auto ml-px"
            />
            <img
                src="{{ asset('images/stock/robot-1.jpeg') }}"
                class="w-full h-auto col-span-7"
            />
        </div>
    </div>
</section>
