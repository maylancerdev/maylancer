@php use Illuminate\Support\Facades\Storage; @endphp
<section class="relative pt-16 overflow-hidden bg-amber-100 sm:pt-24">
    <!-- Header Content -->
    <div class="max-w-screen-xl px-4 mx-auto sm:px-6 lg:px-8">
        <div class="flex flex-col items-center">
            <p
                    class="flex items-center space-x-3.5 text-xl font-medium text-amber-900/70"
            >
                <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="28"
                        height="3"
                        viewBox="0 0 28 3"
                        fill="none"
                >
                    <line
                            y1="1.5"
                            x2="28"
                            y2="1.5"
                            stroke="currentColor"
                            strokeOpacity="0.65"
                            strokeWidth="3"
                    />
                </svg>

                <span>About {{ config('app.name') }}</span>
            </p>
            <h1
                    class="mt-5 text-4xl font-semibold leading-snug text-center text-slate-900 sm:mt-6 sm:text-5xl sm:leading-snug md:mx-auto md:max-w-4xl xl:mx-0"
            >
                We are a small and passionate website development company based in Nigeria, committed to simplifying the process of creating websites.
            </h1>
        </div>
    </div>

    <div class="relative">
        <!-- Background -->
        <div class="absolute inset-0 flex flex-col">
            <div class="flex-1 bg-amber-100"></div>
            <div class="flex-1 w-full bg-vanilla"></div>
            <div class="flex-1 bg-vanilla"></div>
        </div>

        <!-- Gallery -->
        <div class="relative max-w-screen-xl px-4 mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-12 gap-3 mt-16 sm:mt-24 lg:gap-5">
                <div class="flex flex-col col-span-6 gap-3 sm:col-span-4 lg:gap-5">



                        <img
                            class="object-cover object-center w-full h-auto"
                            src="{{ asset('images/about/about-1.jpg')  }}"
                            alt="featured"
                    />


                            <img
                            class="object-cover object-center w-full h-auto ml-auto md:w-2/3"
                            src="{{ asset('images/about/about-3.jpg')  }}"
                            alt="featured"
                    />

                </div>
                <div
                        class="flex-col hidden col-span-4 gap-3 sm:flex md:col-span-2 lg:gap-5"
                >

                    <img
                            class="object-cover object-center w-full h-auto md:mt-12"
                            src="{{ asset('images/about/about-2.jpg')  }}"
                            alt="featured"
                    />


                            <img
                            class="hidden object-cover object-center w-full h-auto ml-auto md:block"
                            src="{{ asset('images/about/about-4.jpg')  }}"
                            alt="featured"
                    />

                </div>
                <div class="flex flex-col col-span-6 gap-3 sm:col-span-4 lg:gap-5">

                        <img
                            class="object-cover object-center w-full h-auto ml-auto md:w-1/2"
                            src="{{ asset('images/about/about-6.jpg')  }}"
                            alt="featured"
                    />

                            <img
                            class="object-cover object-center w-full h-auto"
                            src="{{ asset('images/about/about-5.jpg')  }}"
                            alt="featured"
                    />

                </div>
                <div class="flex-col hidden col-span-2 gap-3 md:flex lg:gap-5">

                        <img
                            class="object-cover object-center w-full h-auto mt-12"
                            src="{{ asset('images/about/about-7.jpg')  }}"
                            alt="featured"
                    />

                </div>
            </div>
        </div>
        <div class="h-16 bg-vanilla sm:h-24"></div>
    </div>
</section>
