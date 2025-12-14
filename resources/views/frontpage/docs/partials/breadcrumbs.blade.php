<nav class="hidden md:flex py-3 border-b border-gray-200 dark:border-slate-800" aria-label="Breadcrumb">
    <ol role="list" class="flex items-center space-x-2 text-sm">
        <li>
            <a href="{{ route('docs.index')}}" class="text-gray-500 dark:text-gray-400 hover:text-indigo-500 dark:hover:text-indigo-400 transition-colors font-medium">
               Docs
            </a>
        </li>
        <li class="flex items-center">
            <svg class="h-4 w-4 text-gray-400 dark:text-gray-600 mx-2" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
            </svg>
            <span class="text-gray-500 dark:text-gray-400 font-medium">
                {{ $repository->fullName ?? ucfirst($repository->slug) }}
            </span>
        </li>

        @if(isset($page) && $page->slug)
            @foreach(generateBreadcrumbs($page->slug) as $breadcrumb)
                <li class="flex items-center">
                    <svg class="h-4 w-4 text-gray-400 dark:text-gray-600 mx-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                    </svg>
                    <span class="text-gray-700 dark:text-gray-300 font-medium" aria-current="page">{{ Str::ucfirst(str_replace('-', ' ', $breadcrumb)) }}</span>
                </li>
            @endforeach
        @endif
    </ol>
</nav>
