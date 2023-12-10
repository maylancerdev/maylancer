<div class="flex items-center border-b-2 border-gray-lighter py-4">
    <div class="text-xs font-normal leading-normal select">
        <select name="alias"onchange="location='<?php echo e(url('docs/'.$currentDoc['id'])); ?>/' + this.options[this.selectedIndex].value">

            <?php if(isset($currentVersion)): ?>


                <?php if(count($versions) > 1): ?>
                    <?php $__currentLoopData = $versions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $version): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($version); ?>" <?php if($currentVersion == $version): ?> selected="selected" <?php endif; ?>>
                            <?php echo e($version); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-bookmark"></span>
                            <?php echo e($currentVersion); ?>

                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <?php $__currentLoopData = $versions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $version): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a href="<?php echo e(route('show', [$currentDoc['id'], $version])); ?>"><?php echo e($version); ?></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </li>
                <?php else: ?>

                    <option value="<?php echo e($currentVersion); ?>" selected="selected">
                        <?php echo e($currentVersion); ?>

                    </option>
                <?php endif; ?>


            <?php endif; ?>




        </select>

    </div>


</div><?php /**PATH C:\laragon\www\maylancer-nova\resources\views/frontpage/docs/partials/version.blade.php ENDPATH**/ ?>