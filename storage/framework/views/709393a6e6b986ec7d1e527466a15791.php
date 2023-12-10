<section class="bg-slate-700 overflow-hidden">

        <div class="mx-auto max-w-7xl overflow-hidden px-6 py-20 sm:py-24 lg:px-8">
            <nav class="-mb-6 columns-2 sm:flex sm:justify-center sm:space-x-12" aria-label="Footer">

                <?php $__currentLoopData = config('settings.menu'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="pb-6">
                        <a href="<?php echo e(url($menu['value'])); ?>"
                           class="leading-6 text-[17px] hover:text-gray-400 text-sm text-white"
                        >
                            <?php echo e($menu['label']); ?>

                        </a>
                    </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </nav>
            <div class="mt-10 flex justify-center space-x-10">


            <?php $__currentLoopData = config('settings.social'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e($social['value']); ?>" class="text-[17px] hover:text-gray-400 text-sm text-white">
                    <span class="sr-only"><?php echo e($social['label']); ?></span>
                    <?php if (isset($component)) { $__componentOriginal4bfb1fa99a7d89eae1cf7ba1287cdfc5 = $component; } ?>
<?php $component = App\View\Components\Svg::resolve(['name' => $social['name']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('svg'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Svg::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4bfb1fa99a7d89eae1cf7ba1287cdfc5)): ?>
<?php $component = $__componentOriginal4bfb1fa99a7d89eae1cf7ba1287cdfc5; ?>
<?php unset($__componentOriginal4bfb1fa99a7d89eae1cf7ba1287cdfc5); ?>
<?php endif; ?>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
            <div class="mt-10 text-center text-[17px] text-sm text-white markup-footer">
                <p>Projects are licensed under Envato Extended & Regular License, unless otherwise noted.</p>
                <p>Content & Graphics © <?php echo e(date('Y')); ?> Maylancer IT (NG) LTD RC:1566097</p>

               <?php if(checkIfContainsRoute(request())): ?>
                    <p class="mt-4 block text-sm text-gray-400">
                       Code highlighting provided by <a href="https://torchlight.dev" target="__blank" class="font-semibold">Torchlight</a>
                    </p>
                <?php endif; ?>
            </div>

        </div>


</section>
<?php /**PATH C:\laragon\www\maylancer-nova\resources\views/layouts/footer.blade.php ENDPATH**/ ?>