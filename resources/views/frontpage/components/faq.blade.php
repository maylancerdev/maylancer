<section class="pb-64 overflow-hidden bg-vanilla md:pt-24 md:pb-32">
    <!-- Container -->
    <div class="relative max-w-screen-xl px-4 mx-auto sm:px-6 lg:px-8">
        <img
            src="images/stock/image-faq.jpeg"
            class="absolute left-0 right-0 h-80 w-full object-cover object-center md:right-6 md:left-[unset] md:h-auto md:w-1/2 lg:right-8"
        />
        <div
            class="relative z-10 translate-y-48 md:w-4/5 md:translate-y-12 lg:w-2/3"
        >
            <div
                class="px-8 py-12 border border-gray-secondary-400/60 bg-gray-secondary-50 sm:py-16 sm:px-12 lg:px-16 lg:py-20"
            >
                <h2
                    class="text-4xl font-semibold leading-tight text-slate-900 sm:text-5xl sm:leading-tight"
                >
                    Frequently asked questions
                </h2>

                <!-- FAQs -->
                <ul
                    class="mt-12 space-y-8 divide-y divide-gray-secondary-400/75 sm:mt-16"
                >
                    <!-- Question / Answer 1 -->
                    <li x-data="{ open: false }">
                        <!-- Question -->
                        <button
                            class="flex items-center justify-between w-full"
                            @click="open = !open"
                        >
                            <p
                                class="text-lg font-semibold text-left text-slate-900 sm:text-xl"
                            >
                                Do I need specific tech?
                            </p>
                            <span
                                class="relative ml-4 flex h-4 w-4 duration-300 before:absolute before:bottom-1/2 before:h-0.5 before:-translate-y-1/2 before:rotate-90 before:bg-slate-800 before:transition-[width] before:content-[''] after:absolute after:bottom-1/2 after:h-0.5 after:w-4 after:-translate-y-1/2 after:bg-slate-800 after:content-[''] sm:h-[18px] sm:w-[18px] sm:after:w-[18px]"
                                :class="open ? 'before:w-0 rotate-0' : 'sm:before:w-[18px] before:w-4 rotate-180'"
                            ></span>
                        </button>

                        <!-- Answer -->
                        <div
                            class="relative overflow-hidden duration-500 max-h-0"
                            x-ref="question1"
                            x-bind:style="open ? 'max-height: ' + $refs.question1.scrollHeight + 'px' : ''"
                        >
                            <div
                                class="px-1 pt-5 text-base leading-relaxed text-slate-700 sm:text-lg sm:leading-relaxed"
                            >
                                Lorem ipsum dolor sit amet vestibulum nullam bibendum. Odio
                                velit curabitur purus tortor laoreet massa diam blandit
                                pulvinar duis ornare. Interdum vestibulum molestie lacinia
                                maecenas tortor lacus nibh pretium faucibus do.
                            </div>
                        </div>
                    </li>

                    <!-- Question / Answer 2 -->
                    <li class="pt-8" x-data="{ open: false }">
                        <!-- Question -->
                        <button
                            class="flex items-center justify-between w-full"
                            @click="open = !open"
                        >
                            <p
                                class="text-lg font-semibold text-left text-slate-900 sm:text-xl"
                            >
                                Where are my podcasts stored?
                            </p>
                            <span
                                class="relative ml-4 flex h-4 w-4 duration-300 before:absolute before:bottom-1/2 before:h-0.5 before:-translate-y-1/2 before:rotate-90 before:bg-slate-800 before:transition-[width] before:content-[''] after:absolute after:bottom-1/2 after:h-0.5 after:w-4 after:-translate-y-1/2 after:bg-slate-800 after:content-[''] sm:h-[18px] sm:w-[18px] sm:after:w-[18px]"
                                :class="open ? 'before:w-0 rotate-0' : 'sm:before:w-[18px] before:w-4 rotate-180'"
                            ></span>
                        </button>

                        <!-- Answer -->
                        <div
                            class="relative overflow-hidden duration-500 max-h-0"
                            x-ref="question1"
                            x-bind:style="open ? 'max-height: ' + $refs.question1.scrollHeight + 'px' : ''"
                        >
                            <div
                                class="px-1 pt-5 text-base leading-relaxed text-slate-700 sm:text-lg sm:leading-relaxed"
                            >
                                Lorem ipsum dolor sit amet vestibulum nullam bibendum. Odio
                                velit curabitur purus tortor laoreet massa diam blandit
                                pulvinar duis ornare. Interdum vestibulum molestie lacinia
                                maecenas tortor lacus nibh pretium faucibus do.
                            </div>
                        </div>
                    </li>

                    <!-- Question / Answer 3 -->
                    <li class="pt-8" x-data="{ open: false }">
                        <!-- Question -->
                        <button
                            class="flex items-center justify-between w-full"
                            @click="open = !open"
                        >
                            <p
                                class="text-lg font-semibold text-left text-slate-900 sm:text-xl"
                            >
                                What if I want to move to a different platform later?
                            </p>
                            <span
                                class="relative ml-4 flex h-4 w-4 duration-300 before:absolute before:bottom-1/2 before:h-0.5 before:-translate-y-1/2 before:rotate-90 before:bg-slate-800 before:transition-[width] before:content-[''] after:absolute after:bottom-1/2 after:h-0.5 after:w-4 after:-translate-y-1/2 after:bg-slate-800 after:content-[''] sm:h-[18px] sm:w-[18px] sm:after:w-[18px]"
                                :class="open ? 'before:w-0 rotate-0' : 'sm:before:w-[18px] before:w-4 rotate-180'"
                            ></span>
                        </button>

                        <!-- Answer -->
                        <div
                            class="relative overflow-hidden duration-500 max-h-0"
                            x-ref="question1"
                            x-bind:style="open ? 'max-height: ' + $refs.question1.scrollHeight + 'px' : ''"
                        >
                            <div
                                class="px-1 pt-5 text-base leading-relaxed text-slate-700 sm:text-lg sm:leading-relaxed"
                            >
                                Lorem ipsum dolor sit amet vestibulum nullam bibendum. Odio
                                velit curabitur purus tortor laoreet massa diam blandit
                                pulvinar duis ornare. Interdum vestibulum molestie lacinia
                                maecenas tortor lacus nibh pretium faucibus do.
                            </div>
                        </div>
                    </li>

                    <!-- Question / Answer 4 -->
                    <li class="pt-8" x-data="{ open: false }">
                        <!-- Question -->
                        <button
                            class="flex items-center justify-between w-full"
                            @click="open = !open"
                        >
                            <p
                                class="text-lg font-semibold text-left text-slate-900 sm:text-xl"
                            >
                                Are larger podcasts more expensive?
                            </p>
                            <span
                                class="relative ml-4 flex h-4 w-4 duration-300 before:absolute before:bottom-1/2 before:h-0.5 before:-translate-y-1/2 before:rotate-90 before:bg-slate-800 before:transition-[width] before:content-[''] after:absolute after:bottom-1/2 after:h-0.5 after:w-4 after:-translate-y-1/2 after:bg-slate-800 after:content-[''] sm:h-[18px] sm:w-[18px] sm:after:w-[18px]"
                                :class="open ? 'before:w-0 rotate-0' : 'sm:before:w-[18px] before:w-4 rotate-180'"
                            ></span>
                        </button>

                        <!-- Answer -->
                        <div
                            class="relative overflow-hidden duration-500 max-h-0"
                            x-ref="question1"
                            x-bind:style="open ? 'max-height: ' + $refs.question1.scrollHeight + 'px' : ''"
                        >
                            <div
                                class="px-1 pt-5 text-base leading-relaxed text-slate-700 sm:text-lg sm:leading-relaxed"
                            >
                                Lorem ipsum dolor sit amet vestibulum nullam bibendum. Odio
                                velit curabitur purus tortor laoreet massa diam blandit
                                pulvinar duis ornare. Interdum vestibulum molestie lacinia
                                maecenas tortor lacus nibh pretium faucibus do.
                            </div>
                        </div>
                    </li>

                    <!-- Question / Answer 5 -->
                    <li class="pt-8" x-data="{ open: false }">
                        <!-- Question -->
                        <button
                            class="flex items-center justify-between w-full"
                            @click="open = !open"
                        >
                            <p
                                class="text-lg font-semibold text-left text-slate-900 sm:text-xl"
                            >
                                Is it secure?
                            </p>
                            <span
                                class="relative ml-4 flex h-4 w-4 duration-300 before:absolute before:bottom-1/2 before:h-0.5 before:-translate-y-1/2 before:rotate-90 before:bg-slate-800 before:transition-[width] before:content-[''] after:absolute after:bottom-1/2 after:h-0.5 after:w-4 after:-translate-y-1/2 after:bg-slate-800 after:content-[''] sm:h-[18px] sm:w-[18px] sm:after:w-[18px]"
                                :class="open ? 'before:w-0 rotate-0' : 'sm:before:w-[18px] before:w-4 rotate-180'"
                            ></span>
                        </button>

                        <!-- Answer -->
                        <div
                            class="relative overflow-hidden duration-500 max-h-0"
                            x-ref="question1"
                            x-bind:style="open ? 'max-height: ' + $refs.question1.scrollHeight + 'px' : ''"
                        >
                            <div
                                class="px-1 pt-5 text-base leading-relaxed text-slate-700 sm:text-lg sm:leading-relaxed"
                            >
                                Lorem ipsum dolor sit amet vestibulum nullam bibendum. Odio
                                velit curabitur purus tortor laoreet massa diam blandit
                                pulvinar duis ornare. Interdum vestibulum molestie lacinia
                                maecenas tortor lacus nibh pretium faucibus do.
                            </div>
                        </div>
                    </li>

                    <!-- Question / Answer 6 -->
                    <li class="pt-8" x-data="{ open: false }">
                        <!-- Question -->
                        <button
                            class="flex items-center justify-between w-full"
                            @click="open = !open"
                        >
                            <p
                                class="text-lg font-semibold text-left text-slate-900 sm:text-xl"
                            >
                                What if I don’t do video?
                            </p>
                            <span
                                class="relative ml-4 flex h-4 w-4 duration-300 before:absolute before:bottom-1/2 before:h-0.5 before:-translate-y-1/2 before:rotate-90 before:bg-slate-800 before:transition-[width] before:content-[''] after:absolute after:bottom-1/2 after:h-0.5 after:w-4 after:-translate-y-1/2 after:bg-slate-800 after:content-[''] sm:h-[18px] sm:w-[18px] sm:after:w-[18px]"
                                :class="open ? 'before:w-0 rotate-0' : 'sm:before:w-[18px] before:w-4 rotate-180'"
                            ></span>
                        </button>

                        <!-- Answer -->
                        <div
                            class="relative overflow-hidden duration-500 max-h-0"
                            x-ref="question1"
                            x-bind:style="open ? 'max-height: ' + $refs.question1.scrollHeight + 'px' : ''"
                        >
                            <div
                                class="px-1 pt-5 text-base leading-relaxed text-slate-700 sm:text-lg sm:leading-relaxed"
                            >
                                Lorem ipsum dolor sit amet vestibulum nullam bibendum. Odio
                                velit curabitur purus tortor laoreet massa diam blandit
                                pulvinar duis ornare. Interdum vestibulum molestie lacinia
                                maecenas tortor lacus nibh pretium faucibus do.
                            </div>
                        </div>
                    </li>

                    <!-- Question / Answer 7 -->
                    <li class="pt-8" x-data="{ open: false }">
                        <!-- Question -->
                        <button
                            class="flex items-center justify-between w-full"
                            @click="open = !open"
                        >
                            <p
                                class="text-lg font-semibold text-left text-slate-900 sm:text-xl"
                            >
                                How does automatic transcription work?
                            </p>
                            <span
                                class="relative ml-4 flex h-4 w-4 duration-300 before:absolute before:bottom-1/2 before:h-0.5 before:-translate-y-1/2 before:rotate-90 before:bg-slate-800 before:transition-[width] before:content-[''] after:absolute after:bottom-1/2 after:h-0.5 after:w-4 after:-translate-y-1/2 after:bg-slate-800 after:content-[''] sm:h-[18px] sm:w-[18px] sm:after:w-[18px]"
                                :class="open ? 'before:w-0 rotate-0' : 'sm:before:w-[18px] before:w-4 rotate-180'"
                            ></span>
                        </button>

                        <!-- Answer -->
                        <div
                            class="relative overflow-hidden duration-500 max-h-0"
                            x-ref="question1"
                            x-bind:style="open ? 'max-height: ' + $refs.question1.scrollHeight + 'px' : ''"
                        >
                            <div
                                class="px-1 pt-5 text-base leading-relaxed text-slate-700 sm:text-lg sm:leading-relaxed"
                            >
                                Lorem ipsum dolor sit amet vestibulum nullam bibendum. Odio
                                velit curabitur purus tortor laoreet massa diam blandit
                                pulvinar duis ornare. Interdum vestibulum molestie lacinia
                                maecenas tortor lacus nibh pretium faucibus do.
                            </div>
                        </div>
                    </li>

                    <!-- Question / Answer 8 -->
                    <li class="pt-8" x-data="{ open: false }">
                        <!-- Question -->
                        <button
                            class="flex items-center justify-between w-full"
                            @click="open = !open"
                        >
                            <p
                                class="text-lg font-semibold text-left text-slate-900 sm:text-xl"
                            >
                                What if I decide to cancel in the future?
                            </p>
                            <span
                                class="relative ml-4 flex h-4 w-4 duration-300 before:absolute before:bottom-1/2 before:h-0.5 before:-translate-y-1/2 before:rotate-90 before:bg-slate-800 before:transition-[width] before:content-[''] after:absolute after:bottom-1/2 after:h-0.5 after:w-4 after:-translate-y-1/2 after:bg-slate-800 after:content-[''] sm:h-[18px] sm:w-[18px] sm:after:w-[18px]"
                                :class="open ? 'before:w-0 rotate-0' : 'sm:before:w-[18px] before:w-4 rotate-180'"
                            ></span>
                        </button>

                        <!-- Answer -->
                        <div
                            class="relative overflow-hidden duration-500 max-h-0"
                            x-ref="question1"
                            x-bind:style="open ? 'max-height: ' + $refs.question1.scrollHeight + 'px' : ''"
                        >
                            <div
                                class="px-1 pt-5 text-base leading-relaxed text-slate-700 sm:text-lg sm:leading-relaxed"
                            >
                                Lorem ipsum dolor sit amet vestibulum nullam bibendum. Odio
                                velit curabitur purus tortor laoreet massa diam blandit
                                pulvinar duis ornare. Interdum vestibulum molestie lacinia
                                maecenas tortor lacus nibh pretium faucibus do.
                            </div>
                        </div>
                    </li>

                    <!-- Question / Answer 9 -->
                    <li class="pt-8" x-data="{ open: false }">
                        <!-- Question -->
                        <button
                            class="flex items-center justify-between w-full"
                            @click="open = !open"
                        >
                            <p
                                class="text-lg font-semibold text-left text-slate-900 sm:text-xl"
                            >
                                Do you offer a free plan?
                            </p>
                            <span
                                class="relative ml-4 flex h-4 w-4 duration-300 before:absolute before:bottom-1/2 before:h-0.5 before:-translate-y-1/2 before:rotate-90 before:bg-slate-800 before:transition-[width] before:content-[''] after:absolute after:bottom-1/2 after:h-0.5 after:w-4 after:-translate-y-1/2 after:bg-slate-800 after:content-[''] sm:h-[18px] sm:w-[18px] sm:after:w-[18px]"
                                :class="open ? 'before:w-0 rotate-0' : 'sm:before:w-[18px] before:w-4 rotate-180'"
                            ></span>
                        </button>

                        <!-- Answer -->
                        <div
                            class="relative overflow-hidden duration-500 max-h-0"
                            x-ref="question1"
                            x-bind:style="open ? 'max-height: ' + $refs.question1.scrollHeight + 'px' : ''"
                        >
                            <div
                                class="px-1 pt-5 text-base leading-relaxed text-slate-700 sm:text-lg sm:leading-relaxed"
                            >
                                Lorem ipsum dolor sit amet vestibulum nullam bibendum. Odio
                                velit curabitur purus tortor laoreet massa diam blandit
                                pulvinar duis ornare. Interdum vestibulum molestie lacinia
                                maecenas tortor lacus nibh pretium faucibus do.
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
