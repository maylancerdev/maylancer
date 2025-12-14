<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">

    <meta name="application-name" content="<?php echo e(config('app.name')); ?>">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo $__env->make('layouts.meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <title><?php echo e($title ?? 'Exceptional websites & web application Development'); ?> | <?php echo e(config('app.name')); ?></title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css',
           'resources/css/main.css',
           'resources/css/style.css',
           'resources/js/app.js'
    ]); ?>
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>


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

    <?php echo e($slot); ?>


    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

    <?php echo $__env->yieldPushContent('modals'); ?>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>

</html>
<?php /**PATH /Users/kunle/Herd/maylancer/resources/views/layouts/base.blade.php ENDPATH**/ ?>