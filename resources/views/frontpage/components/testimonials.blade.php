<section class="py-16 overflow-hidden bg-vanilla sm:py-24 lg:py-28">
    <h2
        class="max-w-xl px-4 mx-auto text-4xl font-semibold leading-tight text-center text-slate-900 sm:max-w-2xl sm:px-6 sm:text-5xl sm:leading-tight lg:px-8"
    >

        Discover Inspiring Client Stories
    </h2>
    <div class="relative mt-20">
        <div
            class="flex items-center gap-6 px-12 animate w-max animate-infiniteScroll sm:gap-8 lg:gap-12"
        >
            <!-- Testimonials -->
            <div class="flex justify-around w-1/2 gap-6 sm:gap-8 lg:gap-12">


                @foreach ($groupedTestimonies as $testimonyGroup)
                    <div class="w-full space-y-6 sm:space-y-8">
                        @foreach ($testimonyGroup as $index => $testimony)
                            @if ($index % 2 == 0)
                                <div
                                    class="w-80 border border-gray-secondary-400/60 bg-gray-secondary-50 px-6 py-8 sm:w-96 sm:p-8 lg:w-[512px] lg:p-10"
                                >
                                    <div class="flex">
                                        <div
                                            class="w-12 h-12 shrink-0 bg-gray-secondary-100 lg:h-14 lg:w-14"
                                        >
                                            <img
                                                class="object-cover object-center"
                                                width="56"
                                                src="{{ $testimony->avatar }}"
                                                alt="Joe Rogan"
                                            />
                                        </div>
                                        <div class="ml-4">
                                            <p class="font-medium text-md text-slate-900 lg:text-lg">
                                                {{ $testimony->name }}
                                            </p>

                                            <p class="text-slate-600/90 sm:text-md lg:text-lg">
                                                {{ $testimony->designation }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="relative">
                                        <svg
                                            class="absolute z-0 w-10 h-10 transform -left-3 -top-3 text-purple-dark/20 sm:-left-4 sm:-top-4 sm:h-12 sm:w-12 lg:-left-6 lg:-top-6 lg:h-16 lg:w-16"
                                            height="48"
                                            width="48"
                                            viewBox="0 0 48 48"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <g>
                                                <path
                                                    d="M21.66145,33.81676c0,4.29661-3.96109,8.22346-8.91304,8.22346C4.56585,42.04022,1,35.98671,1,27.90615 c0-9.27484,9.34862-18.21943,17.83035-21.94637l2.26574,3.64916C14.10766,12.9954,8.88433,17.58691,8.14413,25.28492h2.89106 c3.09587,0,6.31198,0.4991,8.45903,2.72402C21.02498,29.59761,21.66145,31.62025,21.66145,33.81676z M47,33.81676 c0,4.29661-3.96109,8.22346-8.91304,8.22346c-8.18256,0-11.74842-6.05352-11.74842-14.13408 c0-9.27484,9.34862-18.21943,17.83035-21.94637l2.26574,3.64916c-6.98843,3.38646-12.21176,7.97797-12.95195,15.67598 c3.15316,0,5.76908-0.11425,8.09925,0.71955C45.21084,27.30299,47,30.10812,47,33.81676z"
                                                    fill="currentColor"
                                                />
                                            </g>
                                        </svg>
                                        <p
                                            class="relative z-10 mt-8 leading-relaxed text-md text-slate-700 lg:mt-10 lg:text-lg"
                                        >
                                            {{ $testimony->testimonial }}
                                        </p>
                                    </div>
                                </div>
                            @else
                                <div
                                    class="w-80 border border-gray-secondary-400/60 bg-gray-secondary-50 px-6 py-8 sm:w-96 sm:p-8 lg:w-[512px] lg:p-10"
                                >
                                    <div class="flex">
                                        <div
                                            class="w-12 h-12 shrink-0 bg-gray-secondary-100 lg:h-14 lg:w-14"
                                        >
                                            <img
                                                class="object-cover object-center"
                                                width="56"
                                                src="{{ $testimony->avatar }}"
                                                alt="Joe Rogan"
                                            />
                                        </div>
                                        <div class="ml-4">
                                            <p class="font-medium text-md text-slate-900 lg:text-lg">
                                                {{ $testimony->name }}
                                            </p>

                                            <p class="text-slate-600/90 sm:text-md lg:text-lg">
                                                {{ $testimony->designation }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="relative">
                                        <svg
                                            class="absolute z-0 w-10 h-10 transform -left-3 -top-3 text-purple-dark/20 sm:-left-4 sm:-top-4 sm:h-12 sm:w-12 lg:-left-6 lg:-top-6 lg:h-16 lg:w-16"
                                            height="48"
                                            width="48"
                                            viewBox="0 0 48 48"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <g>
                                                <path
                                                    d="M21.66145,33.81676c0,4.29661-3.96109,8.22346-8.91304,8.22346C4.56585,42.04022,1,35.98671,1,27.90615 c0-9.27484,9.34862-18.21943,17.83035-21.94637l2.26574,3.64916C14.10766,12.9954,8.88433,17.58691,8.14413,25.28492h2.89106 c3.09587,0,6.31198,0.4991,8.45903,2.72402C21.02498,29.59761,21.66145,31.62025,21.66145,33.81676z M47,33.81676 c0,4.29661-3.96109,8.22346-8.91304,8.22346c-8.18256,0-11.74842-6.05352-11.74842-14.13408 c0-9.27484,9.34862-18.21943,17.83035-21.94637l2.26574,3.64916c-6.98843,3.38646-12.21176,7.97797-12.95195,15.67598 c3.15316,0,5.76908-0.11425,8.09925,0.71955C45.21084,27.30299,47,30.10812,47,33.81676z"
                                                    fill="currentColor"
                                                />
                                            </g>
                                        </svg>
                                        <p
                                            class="relative z-10 mt-8 leading-relaxed text-md text-slate-700 lg:mt-10 lg:text-lg"
                                        >
                                            {{ $testimony->testimonial }}
                                        </p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endforeach



            </div>

        </div>
    </div>
</section>
</section>
