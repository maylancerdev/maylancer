@if (!config('services.algolia.key'))

    <div>
        <div class="mt-2">
            <input type="text" name="name" id="search" placeholder="Search the docs..."
            class="block w-full border-0 px-4 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 mb-2"
            placeholder="Jane Smith">
        </div>
    </div>

@endif
