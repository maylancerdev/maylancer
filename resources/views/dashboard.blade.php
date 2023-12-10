<x-app-layout>

    <div class="mx-auto max-w-7xl lg:flex lg:gap-x-16 lg:px-8">
      <x-sidebar />

        <main class="px-4 py-16 sm:px-6 lg:flex-auto lg:px-0 lg:py-20">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-gray-900 text-3xl">
                    {{ __("Welcome on board, ".auth()->user()->name) }}


                </div>
                <div class="relative max-w-lg p-8 mx-auto mt-12 border border-gray-secondary-400/60 bg-gray-secondary-50 sm:max-w-xl sm:p-12 md:max-w-2xl lg:max-w-5xl">
                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                        <div class="w-full lg:w-3/5">
                            <h3 class="text-lg font-semibold text-slate-900">Become a sponsor</h3>
                            <p class="mt-4 text-slate-600">
                                Our open-source efforts are supported
                                by the following <a href="">premium GitHub sponsors</a>
                            </p>
                        </div>
                        <a href="https://github.com/sponsors/maylancerdev" class="inline-flex items-center justify-center px-6 py-3 mt-8 text-base font-medium duration-150 ease-in-out border group border-slate-800 text-slate-800 hover:bg-slate-800 hover:text-white lg:mt-0 xl:px-7 xl:py-4 xl:text-lg" variant="ghost">
                            <x-bi-github /> &nbsp; Become a sponsor
                        </a>
                    </div>
                </div>

            </div>
        </main>
    </div>

</x-app-layout>
