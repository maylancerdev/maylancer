<div class=" lg:relative col-span-5 sm:col-span-1 md:col-span-1 lg:col-span-3 lg:block lg:flex-none">
    <?php echo $__env->make('frontpage.docs.partials.search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="absolute bottom-0 right-0 top-16 hidden h-12 w-px bg-gradient-to-t from-slate-800 dark:block"
    >

    </div>
    <div class="absolute bottom-0 right-0 top-28 hidden w-px bg-slate-800 dark:block"></div>
    <div class="sticky -ml-0.5 overflow-y-auto overflow-x-hidden pr-8 xl:pr-16  may-navigation bg-slate-50 p-2"
    >
        <?php echo $__env->make('frontpage.docs.partials.version', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php if($toc): ?>
            <nav class="lg:mt-5 lg:block" id="docNav" data-current-page="<?php echo e($page); ?>">
                <?php echo $toc; ?>

            </nav>
        <?php endif; ?>
    </div>
</div><?php /**PATH C:\laragon\www\maylancer-nova\resources\views/frontpage/docs/partials/sidebar.blade.php ENDPATH**/ ?>