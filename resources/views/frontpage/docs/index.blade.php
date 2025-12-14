<x-app-layout>
    <section class="relative pt-16 overflow-hidden bg-amber-100">
        <!-- Header Content -->
        <div class="max-w-screen-xl px-4 mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col items-center">

                <h1
                        class="mt-2 text-4xl font-semibold leading-snug text-center text-slate-900 sm:mt-6 sm:text-5xl sm:leading-snug md:mx-auto md:max-w-4xl xl:mx-0"
                >
                    Docs
                </h1>
                <h1
                        class="font-semibold leading-snug mb-8 md:max-w-4xl md:mx-auto mt-2 sm:leading-snug text-2xl text-center text-slate-900 xl:mx-0"
                >
                    Explore our extensive collection of package documentation.
                </h1>

            </div>
        </div>
    </section>

    <section class="relative py-16 overflow-hidden bg-vanilla">
        <div class="max-w-screen-xl px-4 mx-auto sm:px-6 lg:px-8">
            <div class="relative items-center w-full max-w-lg mx-auto sm:max-w-xl md:max-w-2xl lg:mx-0 lg:max-w-none lg:gap-12">

                <div class="not-prose mt-4 grid grid-cols-1 gap-x-6 gap-y-10 border-t border-zinc-900/5 pt-10 dark:border-white/5 sm:grid-cols-2 xl:max-w-none xl:grid-cols-3">

                    @foreach ($repositories as $repository)
                        @php
                            $firstAlias = $repository->aliases->first();
                            $firstPage = $firstAlias?->pages->first();
                            $hasDocumentation = $firstAlias && $firstPage;
                        @endphp

                        @if($hasDocumentation)
                            <div class="flex flex-row-reverse gap-6">
                                <div class="flex-auto">
                                    <h3 class="text-sm font-semibold text-zinc-900 dark:text-white">
                                        {{ $repository->fullName ?? ucfirst($repository->slug) }}
                                    </h3>
                                    <p class="mt-1 text-sm text-zinc-600 dark:text-zinc-400">
                                        {{ $repository->description ?? $repository->category }}
                                    </p>
                                    <p class="mt-4"><a
                                                class="inline-flex gap-0.5 justify-center overflow-hidden text-sm font-medium transition text-emerald-500 hover:text-emerald-600 dark:text-emerald-400 dark:hover:text-emerald-500"
                                                href="{{ route('docs.show', [$repository->slug, $firstAlias->slug, $firstPage->slug]) }}">Documentation
                                            <svg viewBox="0 0 20 20" fill="none" aria-hidden="true"
                                                 class="mt-0.5 h-5 w-5 relative top-px -mr-1">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                      d="m11.5 6.5 3 3.5m0 0-3 3.5m3-3.5h-9"></path>
                                            </svg>
                                        </a></p>
                                </div>
                                <x-bi-github class="h-10 w-10" />
                            </div>
                        @endif
                    @endforeach

                </div>



            </div>
        </div>
    </section>

</x-app-layout>
