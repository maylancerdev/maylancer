<section class="relative pt-24 overflow-hidden bg-slate-700 lg:py-24">
    <!-- Container -->
    <div class="max-w-screen-xl px-4 mx-auto sm:px-6 lg:px-8">
        <!-- Content-->
        <div class="relative z-10 w-full max-w-lg mx-auto sm:max-w-xl lg:mx-0">
            <h2
                class="text-4xl font-semibold leading-tight text-white sm:text-5xl sm:leading-tight"
            >
                Hire a team
            </h2>

            <!-- Steps -->
            <div
                class="divide-gray-secondary-400/90 mt-12 sm:mt-16 space-y-8"
            >
               <div class="text-xl leading-snug text-slate-50"> We're not just doers, but proud partners in your success. With our expertise in both back-end and front-end development, we work collaboratively to tackle technically challenging projects.
               </div>
                <div class="text-xl leading-snug text-slate-50">
                    Tell us about your project or the problem you're facing. The more information you provide, the better we can understand and deliver accurate solutions. Let's start this journey together.
                </div>

            </div>

            <a
                href="{{ route('contact') }}"
                class="inline-flex items-center justify-center px-6 py-3 mt-16 text-base font-medium text-white duration-150 ease-in-out border group border-slate-300 hover:border-white hover:bg-white hover:text-slate-900 sm:mt-20 xl:px-7 xl:py-4 xl:text-lg"
            >
                Get in touch
            </a>
        </div>
    </div>

    <!-- Image overlay -->
    <div
        class="relative w-full mt-16 h-80 sm:h-96 lg:absolute lg:inset-y-0 lg:right-0 lg:mt-0 lg:h-full lg:w-5/12"
    >
        <img
            src="{{ asset('images/stock/image-faq.jpeg') }}"
            class="object-cover object-right-top w-full h-full"
        />
        <div
            class="absolute inset-0 bg-gradient-to-b from-slate-700 to-white/0 lg:bg-gradient-to-r"
        ></div>
    </div>
</section>
