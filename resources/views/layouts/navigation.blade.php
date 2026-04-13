<header
    class="relative h-24 bg-amber-100"
    x-data="{ mobileMenuOpen: false }"
>
    <!-- Main navbar for large screens -->
    <div
        class="relative z-30 flex items-center w-full h-full max-w-screen-xl px-4 mx-auto border-b border-gray-secondary-300/60 bg-amber-100 sm:px-6 lg:px-8"
    >
        <nav class="flex items-center justify-between w-full">
            <div class="flex items-center space-x-8 lg:space-x-12">
                <!-- Logo-->

                <x-front.logo />

                <div class="items-center hidden space-x-3 md:flex lg:space-x-4">
                    <x-front.anchor-link class="inline-block px-4 py-2" link="product"> Products </x-front.anchor-link>
                    <x-front.anchor-link class="inline-block px-4 py-2" link="open-source"> Open Source </x-front.anchor-link>
                    <x-front.anchor-link class="inline-block px-4 py-2" link="blog.index"> Blog </x-front.anchor-link>
                    <x-front.anchor-link class="inline-block px-4 py-2" link="vacancies"> Vacancies </x-front.anchor-link>


                </div>
            </div>

            <div>
                <div class="flex items-center space-x-4">
                    <div class="hidden lg:block">
                        <x-front.anchor-link   class="inline-block px-4 py-2" link="web-development"> Web Development </x-front.anchor-link>

                    </div>
                    @auth
                        <x-front.dark-button class="group items-center justify-center bg-slate-700 text-white hover:bg-slate-900" link="dashboard">Account</x-front.dark-button>
                    @else
                        <x-front.dark-button class="group items-center justify-center bg-slate-700 text-white hover:bg-slate-900" link="login">Sign in</x-front.dark-button>
                    @endauth



                    <div class="md:hidden">
                        <div>
                            <button
                                class="flex items-center justify-center p-3 transition duration-300 ease-in-out border cursor-pointer group border-gray-secondary-400/75 bg-gray-secondary-50 focus:outline-none"
                                aria-label="Toggle Navigation"
                                @click="mobileMenuOpen=!mobileMenuOpen"
                            >
                    <span
                        class="relative h-3.5 w-4 transform transition duration-500 ease-in-out"
                    >
                      <span
                          class="absolute top-0 left-0 block h-0.5 w-full rotate-0 transform rounded-full bg-slate-600 opacity-100 transition duration-300 ease-in-out group-hover:bg-slate-900"
                          :class="{ 'w-0 top-1.5 left-1/2': mobileMenuOpen }"
                      ></span>
                      <span
                          class="absolute left-0 top-1.5 block h-0.5 w-full rotate-0 transform rounded-full bg-slate-600 opacity-100 transition duration-300 ease-in-out group-hover:bg-gray-900"
                          :class="{ 'rotate-45': mobileMenuOpen }"
                      ></span>
                      <span
                          class="absolute left-0 top-1.5 block h-0.5 w-full rotate-0 transform rounded-full bg-slate-600 opacity-100 transition duration-300 ease-in-out group-hover:bg-gray-900"
                          :class="{ '-rotate-45': mobileMenuOpen }"
                      ></span>
                      <span
                          class="absolute left-0 top-3 block h-0.5 w-full rotate-0 transform rounded-full bg-slate-600 opacity-100 transition duration-300 ease-in-out group-hover:bg-gray-900"
                          :class="{ 'w-0 top-1.5 left-1/2': mobileMenuOpen }"
                      ></span>
                    </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <!-- Mobile Menu-->
    <div class="md:hidden" x-cloak>
        <div
            x-show="mobileMenuOpen"
            x-transition:enter="duration-200 ease-out"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="duration-200 ease-in"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-20 bg-opacity-25 bg-slate-900 backdrop-blur"
            @click="mobileMenuOpen = false"
        ></div>

        <div
            x-show="mobileMenuOpen"
            x-transition:enter="duration-300 ease-out"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="duration-200 ease-in"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="absolute inset-x-0 z-30 px-5 pt-4 pb-8 overflow-hidden duration-300 top-24 bg-amber-100"
            @click.away="mobileMenuOpen = false"
        >
            <div>
                <div>
                    <div class="flex flex-col divide-y divide-gray-secondary-400/75" @click="mobileMenuOpen = false">

                        <x-front.anchor-link class="block px-4 pt-4 pb-2" link="product"> Product </x-front.anchor-link>
                        <x-front.anchor-link class="block px-4 pt-4 pb-2" link="open-source"> Open Source </x-front.anchor-link>
                        <x-front.anchor-link class="block px-4 pt-4 pb-2" link="blog.index"> Blog </x-front.anchor-link>
                        <x-front.anchor-link class="block px-4 pt-4 pb-2" link="vacancies"> Vacancies </x-front.anchor-link>
                        <x-front.anchor-link   class="block px-4 pt-4 pb-2" link="web-development"> Web Development </x-front.anchor-link>

                    </div>
                    <div class="mt-6">
                        @auth
                            <x-front.dark-button class="border w-full border-slate-800 text-slate-800 hover:text-white" link="dashboard">Account</x-front.dark-button>
                        @else
                            <x-front.dark-button class="border w-full border-slate-800 text-slate-800 hover:text-white" link="login">Sign in</x-front.dark-button>
                        @endauth

                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
