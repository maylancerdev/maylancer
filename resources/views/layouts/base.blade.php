<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">

    <meta name="application-name" content="{{ config('app.name') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('layouts.meta')
    <title>{{ $title ?? 'Exceptional websites & web application Development' }} | {{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css',
           'resources/css/main.css',
           'resources/css/style.css',
           'resources/js/app.js'
    ])
    @livewireStyles

    <script>
        document.addEventListener('alpine:init', () => {
            const Alpine = window.Alpine;
            if (!Alpine) {
                console.error('Alpine not found');
                return;
            }

            Alpine.store('modals', {
                openModals: [],
                init() {
                    if (window.location.hash) {
                        this.openModals.push(window.location.hash.replace('#', ''));
                    }
                },
                isOpen(id) {
                    return this.openModals.includes(id);
                },
                open(id) {
                    if (!this.openModals.includes(id)) {
                        this.openModals.push(id);
                    }
                    window.location.hash = id;
                    Alpine.nextTick(() => {
                        const input = document.querySelector(`#modal-${id} input:not([type=hidden])`);
                        if (input) {
                            input.focus();
                        }
                    });
                },
                close(id) {
                    this.openModals = this.openModals.filter(modal => modal !== id);
                    history.pushState('', document.title, window.location.pathname + window.location.search);
                },
            });

            console.log('Alpine modals store registered:', Alpine.store('modals'));
        });
    </script>
</head>

<body class="font-sans antialiased">

    {{ $slot }}

    @livewireScripts
    @stack('modals')
    @stack('scripts')
</body>

</html>
