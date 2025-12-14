@props(['name'])
@push('modals')
    <div
        x-data
        x-show="$store.modals.isOpen(@js($name))"
        style="display: none"
        x-on:keydown.escape.prevent.stop="$store.modals.close(@js($name))"
        x-on:keydown.window.escape.prevent.stop="$store.modals.close(@js($name))"
        role="dialog"
        aria-modal="true"
        id="modal-{{ $name }}"
        class="fixed inset-0 overflow-y-auto z-50"
        {{ $attributes }}
    >
        <!-- Backdrop -->
        <div
            x-show="$store.modals.isOpen(@js($name))"
            x-transition.opacity
            class="fixed inset-0 bg-gray-900/50"
            x-on:click="$store.modals.close(@js($name))"
        ></div>

        <!-- Modal Container -->
        <div class="relative h-screen min-h-screen flex items-center justify-center p-4">
            <div
                x-show="$store.modals.isOpen(@js($name))"
                x-transition
                x-trap.noscroll.inert="$store.modals.isOpen(@js($name))"
                class="relative w-full max-w-3xl bg-white dark:bg-slate-900 rounded-lg shadow-2xl"
                x-on:click.stop
            >
                <div class="flex flex-col" style="min-height: 16rem; max-height: 70vh;">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
@endpush
