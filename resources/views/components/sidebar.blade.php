<aside class="flex overflow-x-auto border-b border-gray-900/5 py-4 lg:block lg:w-64 lg:flex-none lg:border-0 lg:py-20">
    <nav class="flex-none px-4 sm:px-6 lg:px-0">
        <ul role="list" class="flex gap-x-3 gap-y-1 whitespace-nowrap lg:flex-col">
            <li>
                <!-- Current: "bg-gray-50 text-indigo-600", Default: "text-gray-700 hover:text-indigo-600 hover:bg-gray-50" -->
                <a href="{{ route('dashboard') }}" class="bg-gray-50 text-indigo-600 group flex gap-x-3 rounded-md py-2 pl-2 pr-3 text-sm leading-6 font-semibold">
                    <x-heroicon-o-home class="h-6 w-6 shrink-0 text-indigo-600" />
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('profile.edit') }}" class="text-gray-700 hover:text-indigo-600 hover:bg-gray-50 group flex gap-x-3 rounded-md py-2 pl-2 pr-3 text-sm leading-6 font-semibold">
                    <x-bi-person class="h-6 w-6 shrink-0 text-gray-400 group-hover:text-indigo-600" />
                    Profile
                </a>
            </li>
            <li>
                <a href="{{ route('notification') }}" class="text-gray-700 hover:text-indigo-600 hover:bg-gray-50 group flex gap-x-3 rounded-md py-2 pl-2 pr-3 text-sm leading-6 font-semibold">
                    <x-bi-bell class="h-6 w-6 shrink-0 text-gray-400 group-hover:text-indigo-600" />
                    Notifications
                </a>
            </li>

            <li>
                <a href="{{ route('billing') }}" class="text-gray-700 hover:text-indigo-600 hover:bg-gray-50 group flex gap-x-3 rounded-md py-2 pl-2 pr-3 text-sm leading-6 font-semibold">
                    <x-bi-credit-card class="h-6 w-6 shrink-0 text-gray-400 group-hover:text-indigo-600" />
                    Billing
                </a>
            </li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                        this.closest('form').submit();" class="text-gray-700 hover:text-indigo-600 hover:bg-gray-50 group flex gap-x-3 rounded-md py-2 pl-2 pr-3 text-sm leading-6 font-semibold">
                    <x-bi-power class="h-6 w-6 shrink-0 text-gray-400 group-hover:text-indigo-600" />
                    Logout
                </a>
                </form>
            </li>
        </ul>
    </nav>
</aside>