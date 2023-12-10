<x-app-layout>
    <div class="max-w-screen-xl px-4 mx-auto grid max-w-8xl xl:px-12">
        @include('frontpage.docs.partials.breadcrumbs')
    </div>
    <div class="max-w-screen-xl  px-4 mx-auto sm:px-6 grid grid-cols-5 gap-4  flex max-w-8xl justify-center lg:px-8 xl:px-12">

        @include('frontpage.docs.partials.sidebar')

        @include('frontpage.docs.partials.content')

        @include('frontpage.docs.partials.on-page')

    </div>






</x-app-layout>
