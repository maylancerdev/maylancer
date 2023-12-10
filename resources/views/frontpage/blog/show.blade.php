<x-app-layout>


    <main class="pb-16 lg:pb-24 bg-white dark:bg-gray-900">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
            <article
                    class="mx-auto w-full">


                <div class="relative w-full mb-10">
                    <img src="{{ $post->thumbnail() }}" alt=""
                         class="aspect-[16/9] w-full bg-gray-100 object-cover sm:aspect-[2/1] lg:aspect-[3/2]">
                    <div class="absolute inset-0 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>
                </div>


                <article class=" w-full format mx-auto format-sm sm:format-base lg:format-lg format-blue dark:format-invert ">





                    <h1 class="text-brand-primary mb-3 mt-2 text-center text-3xl font-semibold tracking-tight dark:text-white lg:text-4xl lg:leading-snug"
                    >
                        {{ $post->title }}
                    </h1>




                    <div class="mt-3 flex justify-center space-x-3 text-gray-500 p-3">


                        <div class="flex items-center space-x-2 text-sm mt-1.5">
                            <a href="{{ route('blog.index', ['category' => $post->category->name]) }}" class="text-[17px] relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">{{ $post->category->name }}</a>

                            <time class="text-[17px] text-gray-500 dark:text-gray-400" datetime="2022-10-21T15:48:00.000Z">
                                · {{ $post->created_at }}
                            </time>

                            <span class="flex text-[17px]"> <span class="mt-0.5 mr-1"><x-bi-book /></span>  {{ $post->readingTime }}</span></div>

                    </div>


                    <article class="mb-10 markup sm">
                        <x-markdown class="not-format">
                            {!!  $text !!}
                        </x-markdown>
                    </article>

                    <div>
                        @foreach($post->tags as $tag)
                            <a class="no-underline" href="{{ route('blog.index', ['tag' => $tag->name]) }}">
                            <span class="inline-flex items-center rounded-full bg-yellow-100 px-2 py-1 text-xs font-medium text-yellow-800">
                                {{ Str::ucfirst($tag->name) }}
                            </span>
                            </a>
                        @endforeach
                    </div>


                    <header class="mb-4 lg:mb-6 not-format bg-gray-50 dark:bg-gray-800 flex items-center mb-6 mt-10 not-italic p-5">
                        <address class="flex items-center mb-6 not-italic">
                            <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                                <img class="mr-4 w-16 h-16 rounded-full" src="{{ $post->user->avatar }}"
                                     alt="Jese Leos">
                                <div>
                                    <p class="text-xl font-bold text-gray-900 dark:text-white">{{ Str::ucfirst($post->user->name) }}</p>
                                    <p class="text-base font-light text-gray-500 dark:text-gray-400">Co-owner & CEO
                                        Maylancer</p>
                                    <p class="text-base font-light text-gray-500 dark:text-gray-400">
                                        I'm a PHP developer and Laravel enthusiast
                                    </p>
                                    <div class="flex items-center gap-4 mt-2">
                                        <a href="https://twitter.com/0xkunle" class="group">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                 viewBox="0 0 20 20" class="duration-150 group-hover:fill-slate-500">
                                                <path d="M20 3.75C19.25 4.125 18.5 4.25 17.625 4.375C18.5 3.875 19.125 3.125 19.375 2.125C18.625 2.625 17.75 2.875 16.75 3.125C16 2.375 14.875 1.875 13.75 1.875C11.625 1.875 9.75 3.75 9.75 6C9.75 6.375 9.75 6.625 9.875 6.875C6.5 6.75 3.375 5.125 1.375 2.625C1 3.25 0.875 3.875 0.875 4.75C0.875 6.125 1.625 7.375 2.75 8.125C2.125 8.125 1.5 7.875 0.875 7.625C0.875 9.625 2.25 11.25 4.125 11.625C3.75 11.75 3.375 11.75 3 11.75C2.75 11.75 2.5 11.75 2.25 11.625C2.75 13.25 4.25 14.5 6.125 14.5C4.75 15.625 3 16.25 1 16.25C0.625 16.25 0.375 16.25 0 16.25C1.875 17.375 4 18.125 6.25 18.125C13.75 18.125 17.875 11.875 17.875 6.5C17.875 6.375 17.875 6.125 17.875 6C18.75 5.375 19.5 4.625 20 3.75Z"></path>
                                            </svg>
                                        </a>
                                        <a href="https://youtube.com/@olakunle" class="group">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                 viewBox="0 0 20 20" class="duration-150 group-hover:fill-slate-500">
                                                <path d="M19.75 6C19.5 4.375 18.75 3.25 17 3C14.25 2.5 10 2.5 10 2.5C10 2.5 5.75 2.5 3 3C1.25 3.25 0.375 4.375 0.25 6C0 7.625 0 10 0 10C0 10 0 12.375 0.25 14C0.5 15.625 1.25 16.75 3 17C5.75 17.5 10 17.5 10 17.5C10 17.5 14.25 17.5 17 17C18.75 16.625 19.5 15.625 19.75 14C20 12.375 20 10 20 10C20 10 20 7.625 19.75 6ZM7.5 13.75V6.25L13.75 10L7.5 13.75Z"></path>
                                            </svg>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </address>
                    </header>


                </div>


            </article>


        </div>
    </main>


</x-app-layout>
