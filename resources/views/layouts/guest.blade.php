<x-base-layout>
    <x-navigation />

    <section class="py-16 bg-amber-100 sm:py-20">
        <div class="flex flex-col items-center pt-6 sm:pt-0 dark:bg-gray-900 mt-16 mb-52">


            <div class="w-full sm:max-w-md mt-6 px-6 py-4 shadow-md overflow-hidden sm:rounded-lg bg-vanilla">
                {{ $slot }}
            </div>
        </div>
    </section>
    <x-footer />


 </x-base-layout>
