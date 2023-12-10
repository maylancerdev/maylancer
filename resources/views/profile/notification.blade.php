<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notifications') }}
        </h2>
    </x-slot>


    <div class="mx-auto max-w-7xl lg:flex lg:gap-x-16 lg:px-8">
        <x-sidebar />

        <main class="px-4 py-16 sm:px-6 lg:flex-auto lg:px-0 lg:py-20">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-900 shadow sm:rounded-lg border-2">
                <div class="max-w-xl">
                    <section class="space-y-6">
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Notifications') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('You currently do not have any notifications. We will notify you as soon as there is new information or updates.') }}
                            </p>
                        </header>



                    </section>

                </div>
            </div>

        </main>
    </div>



</x-app-layout>
