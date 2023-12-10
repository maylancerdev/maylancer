<section
        class="relative pb-16 overflow-hidden bg-vanilla sm:pb-20 lg:pb-24"
>
    <div class="py-16 bg-amber-100 sm:pt-28 sm:pb-24 lg:pt-32">
        <!-- Container -->
        <div class="max-w-screen-xl px-4 mx-auto sm:px-6 lg:px-8">
            <!-- Header -->
            <div
                    class="items-center max-w-lg mx-auto sm:max-w-3xl lg:mx-0 lg:grid lg:max-w-none lg:grid-cols-2 lg:gap-16"
            >
                <div class="flex flex-col items-center lg:items-start">

                    <h1
                            class="mt-5 text-4xl font-semibold leading-snug text-center text-slate-900 sm:max-w-xl sm:text-5xl sm:leading-snug md:mx-auto lg:text-left xl:mx-0"
                    >
                        Meet the team
                    </h1>
                </div>

            </div>
        </div>
    </div>

    <div class="relative bg-vanilla">
        <div class="absolute inset-x-0 h-40 bg-amber-100"></div>
        <!-- Container -->
        <div class="max-w-screen-xl px-4 mx-auto sm:px-6 lg:px-8">
            <!-- Team -->
            <div
                    class="grid max-w-lg mx-auto gap-x-8 gap-y-14 sm:max-w-xl lg:mx-0 lg:max-w-none lg:grid-cols-3"
            >
                <!-- Team member 1 -->
                @foreach(config('settings.team') as $team)
                    <div class="relative z-10">
                        <!-- image -->
                        <div class="aspect-w-1 aspect-h-1">
                            <img
                                    src="{{ asset('images/about/'.$team['avatar'])  }}"
                                    alt=" {{ $team['full_name'] }}"
                                    class="object-cover object-center"
                            />
                        </div>

                        <!-- Team member info -->
                        <div class="mt-6">
                            <div class="flex items-center justify-between">
                                <p class="text-xl font-semibold text-slate-900">
                                   {{ $team['full_name'] }}
                                </p>

                                <!-- Social links -->
                                <div class="flex items-center gap-2">
                                 @if(!is_null($team['twitter']))
                                        <a
                                            href="{{ $team['twitter'] }}"
                                            class="flex items-center justify-center w-8 h-8 duration-150 border group border-gray-secondary-400/75 hover:bg-gray-secondary-50"
                                    >
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
                                                <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865l8.875 11.633Z"/>
                                            </svg>
                                    </a>
                                    @endif

                                     @if(!is_null($team['github']))<a
                                            href="{{ $team['github'] }}"
                                            class="flex items-center justify-center w-8 h-8 duration-150 border group border-gray-secondary-400/75 hover:bg-gray-secondary-50"
                                    >
                                         <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">                         <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />                     </svg>
                                    </a>
                                     @endif
                                </div>
                            </div>

                            <p class="mt-1 text-lg text-slate-600">{{ $team['position'] }}</p>
                        </div>
                    </div>

                @endforeach




            </div>
        </div>
    </div>
</section>
