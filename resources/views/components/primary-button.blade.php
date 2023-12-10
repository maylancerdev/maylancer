<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex justify-center px-5 py-2.5 text-base font-medium duration-150 ease-in-out hover:bg-slate-800 group items-center justify-center bg-slate-700 text-white hover:bg-slate-900']) }}>
    {{ $slot }}
</button>
