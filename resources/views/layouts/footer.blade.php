<section class="bg-slate-700 overflow-hidden">

        <div class="mx-auto max-w-7xl overflow-hidden px-6 py-20 sm:py-24 lg:px-8">
            <nav class="-mb-6 columns-2 sm:flex sm:justify-center sm:space-x-12" aria-label="Footer">

                @foreach(config('settings.menu') as $menu)
                    <div class="pb-6">
                        <a href="{{ url($menu['value']) }}"
                           class="leading-6 text-[17px] hover:text-gray-400 text-sm text-white"
                        >
                            {{ $menu['label'] }}
                        </a>
                    </div>
            @endforeach

            </nav>
            <div class="mt-10 flex justify-center space-x-10">


            @foreach(config('settings.social') as $social)
                <a href="{{ $social['value'] }}" class="text-[17px] hover:text-gray-400 text-sm text-white">
                    <span class="sr-only">{{ $social['label'] }}</span>
                    <x-svg :name="$social['name']" />
                </a>
            @endforeach

            </div>
            <div class="mt-10 text-center text-[17px] text-sm text-white markup-footer">
                <p>Projects are licensed under Envato Extended & Regular License, unless otherwise noted.</p>
                <p>Content & Graphics © {{ date('Y') }} Maylancer IT (NG) LTD RC:1566097</p>

               @if(checkIfContainsRoute(request()))
                    <p class="mt-4 block text-sm text-gray-400">
                       Code highlighting provided by <a href="https://torchlight.dev" target="__blank" class="font-semibold">Torchlight</a>
                    </p>
                @endif
            </div>

        </div>


</section>
