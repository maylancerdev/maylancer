<x-app-layout>
    <div class="min-h-screen bg-gray-50 dark:bg-slate-950">
        <div class="flex max-w-screen-2xl mx-auto">
            <!-- Left Sidebar - Navigation -->
            <aside class="hidden lg:block w-72 border-r border-gray-200 dark:border-slate-800 bg-white dark:bg-slate-900 sticky top-0 h-screen overflow-y-auto">
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

    <!-- Search Modal -->
    <x-search-modal name="search-modal">
        @include('frontpage.docs.partials.search-modal-content')
    </x-search-modal>
</x-app-layout>
