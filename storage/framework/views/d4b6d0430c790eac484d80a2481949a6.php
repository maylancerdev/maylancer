<nav class="flex py-3 border-b border-gray-200 dark:border-slate-800" aria-label="Breadcrumb">
    <ol role="list" class="flex items-center space-x-2 text-sm">
        <li>
            <a href="<?php echo e(route('docs.index')); ?>" class="text-gray-500 dark:text-gray-400 hover:text-indigo-500 dark:hover:text-indigo-400 transition-colors font-medium">
               Docs
            </a>
        </li>
        <li class="flex items-center">
            <svg class="h-4 w-4 text-gray-400 dark:text-gray-600 mx-2" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
            </svg>
            <a href="<?php echo e(route('docs.repository', [$repository->slug, $alias->slug])); ?>" class="text-gray-500 dark:text-gray-400 hover:text-indigo-500 dark:hover:text-indigo-400 transition-colors font-medium">
                <?php echo e($repository->title); ?>

            </a>
        </li>

        <?php if(isset($page) && $page->slug): ?>
            <?php $__currentLoopData = generateBreadcrumbs($page->slug); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="flex items-center">
                    <svg class="h-4 w-4 text-gray-400 dark:text-gray-600 mx-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                    </svg>
                    <span class="text-gray-700 dark:text-gray-300 font-medium" aria-current="page"><?php echo e(Str::ucfirst(str_replace('-', ' ', $breadcrumb))); ?></span>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </ol>
</nav>
<?php /**PATH /Users/kunle/Herd/maylancer/resources/views/frontpage/docs/partials/breadcrumbs.blade.php ENDPATH**/ ?>