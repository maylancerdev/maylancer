<section class="relative py-16 bg-vanilla sm:py-20">
    <!-- Container -->
    <div class="max-w-screen-xl px-4 mx-auto sm:px-6 lg:px-8">
        <div
                class="max-w-lg mx-auto sm:max-w-xl md:max-w-2xl lg:mx-0 lg:max-w-none"
        >
            <!-- Heading -->
            <div class="flex flex-col items-center lg:items-start mb-16">

                <h1
                        class="mt-3 text-center text-4xl font-semibold leading-snug text-slate-900 sm:mt-4 sm:max-w-xl sm:text-[40px] sm:leading-snug md:mx-auto lg:mx-0 lg:text-left"
                >
                    Some of our clients

                </h1>
            </div>

            <!-- Map -->
            <div class="wrap wrap-6 items-start">
                <ul role="list" class="grid grid-cols-1 gap-x-6 gap-y-8 lg:grid-cols-3 xl:gap-x-8">
                    <li class="overflow-hidden">
                        <div class="sm:col-span-2">
                            <div class="border-l-4 markup pl-4 text-sm text-sm">
                                <h3 class="text-2xl">Corporate</h3>
                                <ul class="links-underline links-black">
                                    <?php $__currentLoopData = config('settings.corporate'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <li class="mt-5  text-[17px]">
                                            <a href="<?php echo e($client['website']); ?>" target="_blank" rel="noreferrer noopener"><?php echo e($client['name']); ?></a>
                                            <div class="text-gray text-[15px]"><?php echo e($client['about']); ?></div>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="overflow-hidden">
                        <div class="sm:col-span-2">
                            <div class="border-l-4 markup pl-4 text-sm text-sm">
                                <h3 class="text-2xl">Public</h3>
                                <ul class="links-underline links-black">
                                    <?php $__currentLoopData = config('settings.public'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <li class="mt-5  text-[17px]">
                                            <a href="<?php echo e($client['website']); ?>" target="_blank" rel="noreferrer noopener"><?php echo e($client['name']); ?></a>
                                            <div class="text-gray text-[15px]"><?php echo e($client['about']); ?></div>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="overflow-hidden">
                        <div class="sm:col-span-2">
                            <div class="border-l-4 markup pl-4 text-sm text-sm">
                                <h3 class="text-2xl">Creative</h3>
                                <ul class="links-underline links-black">
                                    <?php $__currentLoopData = config('settings.creative'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <li class="mt-5  text-[17px]">
                                            <a href="<?php echo e($client['website']); ?>" target="_blank" rel="noreferrer noopener"><?php echo e($client['name']); ?></a>
                                            <div class="text-gray text-[15px]"><?php echo e($client['about']); ?></div>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>

            </div>
        </div>
    </div>
</section>
<?php /**PATH C:\laragon\www\maylancer-nova\resources\views/frontpage/web-development/partials/clients.blade.php ENDPATH**/ ?>