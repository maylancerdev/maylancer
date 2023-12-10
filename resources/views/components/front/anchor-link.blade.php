@props([
     'link' => '',
    ])
@php

 $active = request()->routeIs($link) ? 'font-bold text-amber-900/70 bg-amber-50' : ''

@endphp
<a
    href="{{ route($link) }}" {{ $attributes->merge(['class' => 'font-medium text-slate-700 hover:bg-amber-50 hover:text-slate-900 '.$active]) }}
>
    {{ $slot  }}
</a>
