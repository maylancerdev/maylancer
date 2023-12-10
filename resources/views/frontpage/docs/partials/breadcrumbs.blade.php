
<nav class="flex py-2" aria-label="Breadcrumb">
    <ol role="list" class="flex items-center space-x-1 text-[17px]">
        <li>
            <div>
                <div class="flex items-center">
                <a href="{{ route('index')}}" class="hover:text-gray-500 text-vr-sm">
                   Docs
                </a>
                </div>
            </div>
        </li>
        <li>
            <div class="flex items-center">
                <x-fontisto-angle-right class="h-1.5 w-1.5 flex-shrink-0" />
                <a href="{{ route('show', [$doc, $version]) }}" class="ml-1.5 text-sm font-medium text-gray-500 hover:text-gray-700 text-vr-sm">{{ ucfirst($doc) }}</a>
            </div>
        </li>

        @foreach(generateBreadcrumbs($page) as $breadcrumb)
            <li>
                <div class="flex items-center">
                    <x-fontisto-angle-right class="h-1.5 w-1.5 flex-shrink-0"  />
                    <span class="ml-1.5 text-sm font-medium text-gray-500 text-vr-sm" aria-current="page">{{ Str::ucfirst($breadcrumb) }}</span>
                </div>
            </li>
        @endforeach


    </ol>
</nav>

