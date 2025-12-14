<x-app-layout>
    <div class="min-h-screen bg-gray-50 dark:bg-slate-950" x-data="{ sidebarOpen: false }">
        <!-- Mobile Overlay -->
        <div
            x-show="sidebarOpen"
            x-transition:enter="transition-opacity ease-linear duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-linear duration-300"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            @click="sidebarOpen = false"
            class="lg:hidden fixed inset-0 bg-gray-900 bg-opacity-50 z-40"
            style="display: none;"
        ></div>

        <!-- Breadcrumbs -->
        <div class="bg-white dark:bg-slate-900 border-b border-gray-200 dark:border-slate-800">
            <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center gap-4">
                <!-- Mobile Menu Button (Top Left) -->
                <button
                    @click="sidebarOpen = true"
                    class="lg:hidden p-2 text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200"
                    aria-label="Open navigation menu"
                >
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>

                <div class="flex-1">
                    @include('frontpage.docs.partials.breadcrumbs')
                </div>
            </div>
        </div>

        <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex">
                <!-- Left Sidebar - Navigation -->
                <aside
                    x-bind:class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
                    class="fixed lg:static top-0 left-0 z-50 lg:z-auto w-72 h-screen lg:h-auto overflow-y-auto border-r border-gray-200 dark:border-slate-800 bg-white dark:bg-slate-900 transform lg:transform-none transition-transform duration-300 ease-in-out lg:block"
                >
                    <!-- Close Button (Mobile Only) -->
                    <button
                        @click="sidebarOpen = false"
                        class="lg:hidden absolute top-4 right-4 p-2 text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200"
                        aria-label="Close navigation menu"
                    >
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>

                    @include('frontpage.docs.partials.sidebar')
                </aside>

                <!-- Main Content -->
                <main class="flex-1 min-w-0 px-8 py-12 lg:px-12 xl:px-16">
                    @include('frontpage.docs.partials.content')
                </main>

                <!-- Right Sidebar - On This Page -->
                <aside class="hidden xl:block w-64 border-l border-gray-200 dark:border-slate-800 bg-white dark:bg-slate-900 sticky top-0 h-screen overflow-y-auto px-6 py-12">
                    @include('frontpage.docs.partials.on-page')
                </aside>
            </div>
        </div>
    </div>

    <!-- Search Modal -->
    <x-search-modal name="search-modal">
        @include('frontpage.docs.partials.search-modal-content')
    </x-search-modal>
</x-app-layout>
