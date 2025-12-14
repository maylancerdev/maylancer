<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <section class="relative pt-16 overflow-hidden bg-amber-100 sm:pt-24">
        <!-- Header Content -->
        <div class="max-w-screen-xl px-4 mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col items-center pb-16">
                <h1
                    class="font-semibold leading-snug md:max-w-4xl md:mx-auto mt-5 sm:leading-snug sm:mt-6 sm:text-5xl text-4xl text-center text-slate-900 xl:mx-0"
                >
                    Open Source Packages
                </h1>
                <p
                    class="max-w-xl mx-auto mt-5 text-lg leading-relaxed text-center text-slate-700 sm:mt-6"
                >
                    We've created more than <?php echo count(config('maylancer.open-source')) ?> packages and software for Laravel and PHP developers.
                </p>
            </div>
        </div>

    </section>


    <!-- Open Source Packages -->
    <section class="relative py-16 bg-vanilla sm:py-20">
        <!-- Container -->
        <div class="max-w-screen-xl px-4 mx-auto sm:px-6 lg:px-8">
            <div class="grid items-start max-w-lg gap-12 mx-auto sm:max-w-xl md:max-w-2xl lg:mx-0 lg:max-w-none lg:grid-cols-12">
                <!-- Package Cards -->
                <div class="grid gap-6 sm:grid-cols-2 lg:col-span-7 lg:gap-5 xl:gap-8">
                    <?php $__currentLoopData = config('maylancer.open-source'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="px-6 py-8 border border-gray-secondary-400/60 bg-gray-secondary-50 xl:p-10">
                            <div class="flex flex-col">
                                <div>
                                    <h3 class="text-xl font-semibold text-slate-900">
                                        <?php echo e($project['name']); ?>

                                    </h3>
                                    <p class="mt-4 text-sm leading-relaxed text-slate-700">
                                        <?php echo e($project['description']); ?>

                                    </p>
                                </div>

                                <!-- Action Buttons -->
                                <div class="flex items-center mt-6 space-x-3">
                                    <?php if(isset($project['docs'])): ?>
                                        <a href="<?php echo e($project['docs']); ?>" target="_blank" class="group inline-flex items-center justify-center border border-slate-800 px-5 py-2.5 text-base font-medium text-slate-800 duration-150 ease-in-out hover:bg-slate-800 hover:text-white">
                                            Docs
                                        </a>
                                    <?php endif; ?>

                                    <?php if(isset($project['demo'])): ?>
                                        <a href="<?php echo e($project['demo']); ?>" target="_blank" class="group inline-flex items-center justify-center border border-slate-800 px-5 py-2.5 text-base font-medium text-slate-800 duration-150 ease-in-out hover:bg-slate-800 hover:text-white">
                                            Demo
                                        </a>
                                    <?php endif; ?>

                                    <?php if(isset($project['repository'])): ?>
                                        <a href="<?php echo e($project['repository']); ?>" target="_blank" class="group inline-flex items-center justify-center border border-slate-800 px-5 py-2.5 text-base font-medium text-slate-800 duration-150 ease-in-out hover:bg-slate-800 hover:text-white">
                                            GitHub
                                        </a>
                                    <?php endif; ?>

                                    <?php if(isset($project['website'])): ?>
                                        <a href="<?php echo e($project['website']); ?>" target="_blank" class="group inline-flex items-center justify-center border border-slate-800 px-5 py-2.5 text-base font-medium text-slate-800 duration-150 ease-in-out hover:bg-slate-800 hover:text-white">
                                            Website
                                        </a>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH /Users/kunle/Herd/maylancer/resources/views/frontpage/open-source/index.blade.php ENDPATH**/ ?>