<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['name']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['name']); ?>
<?php foreach (array_filter((['name']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php $__env->startPush('modals'); ?>
    <div
        x-data
        x-show="$store.modals.isOpen(<?php echo \Illuminate\Support\Js::from($name)->toHtml() ?>)"
        style="display: none"
        x-on:keydown.escape.prevent.stop="$store.modals.close(<?php echo \Illuminate\Support\Js::from($name)->toHtml() ?>)"
        x-on:keydown.window.escape.prevent.stop="$store.modals.close(<?php echo \Illuminate\Support\Js::from($name)->toHtml() ?>)"
        role="dialog"
        aria-modal="true"
        id="modal-<?php echo e($name); ?>"
        class="fixed inset-0 overflow-y-auto z-50"
        <?php echo e($attributes); ?>

    >
        <!-- Backdrop -->
        <div
            x-show="$store.modals.isOpen(<?php echo \Illuminate\Support\Js::from($name)->toHtml() ?>)"
            x-transition.opacity
            class="fixed inset-0 bg-gray-900/50"
            x-on:click="$store.modals.close(<?php echo \Illuminate\Support\Js::from($name)->toHtml() ?>)"
        ></div>

        <!-- Modal Container -->
        <div class="relative h-screen min-h-screen flex items-center justify-center p-4">
            <div
                x-show="$store.modals.isOpen(<?php echo \Illuminate\Support\Js::from($name)->toHtml() ?>)"
                x-transition
                x-trap.noscroll.inert="$store.modals.isOpen(<?php echo \Illuminate\Support\Js::from($name)->toHtml() ?>)"
                class="relative w-full max-w-3xl bg-white dark:bg-slate-900 rounded-lg shadow-2xl"
                x-on:click.stop
            >
                <div class="flex flex-col" style="min-height: 16rem; max-height: 70vh;">
                    <?php echo e($slot); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopPush(); ?>
<?php /**PATH /Users/kunle/Herd/maylancer/resources/views/components/search-modal.blade.php ENDPATH**/ ?>