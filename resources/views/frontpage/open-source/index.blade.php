<x-app-layout>
    <section class="relative pt-16 overflow-hidden bg-amber-100 sm:pt-24">
        <!-- Header Content -->
        <div class="max-w-screen-xl px-4 mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col items-center pb-16">
                <h1
                    class="font-semibold leading-snug md:max-w-4xl md:mx-auto mt-5 sm:leading-snug sm:mt-6 sm:text-5xl text-4xl text-center text-slate-900 xl:mx-0"
                >
                    Open Source Packages
                </h1>
                <p
                    class="max-w-xl mx-auto mt-5 text-lg leading-relaxed text-center text-slate-700 sm:mt-6"
                >
                    We've created more than @php echo count(config('maylancer.open-source')) @endphp packages and software for Laravel and PHP developers.
                </p>
            </div>
        </div>

    </section>


    <!-- Open Source Packages -->
    <section class="relative py-16 bg-vanilla sm:py-20">
        <!-- Container -->
        <div class="max-w-screen-xl px-4 mx-auto sm:px-6 lg:px-8">
            <div class="gap-12 items-start lg:grid-cols-12 lg:max-w-none lg:mx-0 max-w-lg md:max-w-2xl mx-auto sm:max-w-xl">
                <!-- Package Cards -->
                <div class="grid gap-6 sm:grid-cols-2 lg:col-span-7 lg:gap-5 xl:gap-8">
                    @foreach(config('maylancer.open-source') as $key => $project)
                        <div class="px-6 py-8 border border-gray-secondary-400/60 bg-gray-secondary-50 xl:p-10">
                            <div class="flex flex-col">
                                <div>
                                    <h3 class="text-xl font-semibold text-slate-900">
                                        {{ $project['name'] }}
                                    </h3>
                                    <p class="mt-4 text-sm leading-relaxed text-slate-700">
                                        {{ $project['description'] }}
                                    </p>
                                </div>

                                <!-- Action Buttons -->
                                <div class="flex items-center mt-6 space-x-3">
                                    @if(isset($project['docs']))
                                        <a href="{{ $project['docs'] }}" target="_blank" class="group inline-flex items-center justify-center border border-slate-800 px-5 py-2.5 text-base font-medium text-slate-800 duration-150 ease-in-out hover:bg-slate-800 hover:text-white">
                                            Docs
                                        </a>
                                    @endif

                                    @if(isset($project['demo']))
                                        <a href="{{ $project['demo'] }}" target="_blank" class="group inline-flex items-center justify-center border border-slate-800 px-5 py-2.5 text-base font-medium text-slate-800 duration-150 ease-in-out hover:bg-slate-800 hover:text-white">
                                            Demo
                                        </a>
                                    @endif

                                    @if(isset($project['repository']))
                                        <a href="{{ $project['repository'] }}" target="_blank" class="group inline-flex items-center justify-center border border-slate-800 px-5 py-2.5 text-base font-medium text-slate-800 duration-150 ease-in-out hover:bg-slate-800 hover:text-white">
                                            GitHub
                                        </a>
                                    @endif

                                    @if(isset($project['website']))
                                        <a href="{{ $project['website'] }}" target="_blank" class="group inline-flex items-center justify-center border border-slate-800 px-5 py-2.5 text-base font-medium text-slate-800 duration-150 ease-in-out hover:bg-slate-800 hover:text-white">
                                            Website
                                        </a>
                                    @endif

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
