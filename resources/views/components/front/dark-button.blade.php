<a {{ $attributes->merge(['class' => 'inline-flex justify-center px-5 py-2.5 text-base font-medium duration-150 ease-in-out hover:bg-slate-800']) }}
    href="{{ route($link) }}">
    {{ $slot  }}
</a>
