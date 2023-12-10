<section
    class="relative pt-20 pb-8 overflow-hidden bg-amber-50 lg:pt-28 lg:pb-12"
>
    <!-- Container -->
    <div class="max-w-screen-xl px-4 mx-auto sm:px-6 lg:px-8">
        <div
            class="relative w-full max-w-lg mx-auto sm:max-w-3xl lg:mx-0 lg:max-w-none"
        >
            <h2
                class="max-w-2xl mx-auto text-4xl font-semibold leading-tight text-center text-slate-900 sm:text-5xl sm:leading-tight"
            >
                Welcome! <br>Get ready to explore our amazing store.
            </h2>

            <!-- Features -->
            <div
                class="grid mt-10 sm:mt-16 sm:grid-cols-2 gap-2 lg:mt-24 lg:grid-cols-2"
            >
                <!-- Feature 1 -->
                @foreach ($products as $product)

                    <div
                                class="relative mx-auto flex max-w-md flex-col items-center justify-center py-12 px-8 sm:mx-0 sm:max-w-none sm:after:right-0 sm:after:h-5/6 sm:after:w-px sm:after:content-[''] xl:py-16 xl:px-12 border-2 rounded-3xl"
                            >
                                <div class="flex flex-col items-center flex-1">
                                     <div class="">
                                         <img src="{{ $product->thumbnail() }}" alt="{{ $product->name }}">

                                     </div>
                                    <h3
                                        class="mt-8 text-3xl font-semibold text-center leading-tighter text-slate-900 sm:mt-12"
                                    >
                                        {{ $product->name }}
                                    </h3>
                                    <p
                                        class="mt-5 leading-relaxed text-center text-slate-600 sm:mt-6"
                                    >
                                        {{ $product->description }}
                                    </p>
                                </div>
                                <a
                                    href="{{ $product->external_link }}" target="_blank"
                                    class="group mt-12 inline-flex items-center justify-center border border-slate-800 px-5 py-2.5 text-base font-medium text-slate-800 duration-150 ease-in-out hover:bg-slate-800 hover:text-white sm:mt-16"
                                >
                                    Learn more
                                </a>
                            </div>

                @endforeach



            </div>
        </div>
    </div>
</section>
