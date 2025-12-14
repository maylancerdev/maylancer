<div class="mb-6 pb-6 border-b border-gray-200 dark:border-slate-700">
    <select
        id="version-select"
        name="alias"
        onchange="location='<?php echo e(url('docs/'.$currentDoc['id'])); ?>/' + this.options[this.selectedIndex].value"
        class="w-full px-3 py-2 text-sm bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-lg text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
    >
        <?php if(isset($currentVersion)): ?>
            <?php if(count($versions) > 1): ?>
                <?php $__currentLoopData = $versions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $version): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($version); ?>" <?php if($currentVersion == $version): ?> selected="selected" <?php endif; ?>>
                        <?php echo e($version); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <option value="<?php echo e($currentVersion); ?>" selected="selected">
                    <?php echo e($currentVersion); ?>

                </option>
            <?php endif; ?>
        <?php endif; ?>
    </select>
</div>
<?php /**PATH /Users/kunle/Herd/maylancer/resources/views/frontpage/docs/partials/version.blade.php ENDPATH**/ ?>