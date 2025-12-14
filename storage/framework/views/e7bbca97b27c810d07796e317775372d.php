<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <section class="relative pt-16 overflow-hidden bg-amber-100">
        <!-- Header Content -->
        <div class="max-w-screen-xl px-4 mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col items-center">

                <h1
                        class="mt-2 text-4xl font-semibold leading-snug text-center text-slate-900 sm:mt-6 sm:text-5xl sm:leading-snug md:mx-auto md:max-w-4xl xl:mx-0"
                >
                    Docs
                </h1>
                <h1
                        class="font-semibold leading-snug mb-8 md:max-w-4xl md:mx-auto mt-2 sm:leading-snug text-2xl text-center text-slate-900 xl:mx-0"
                >
                    Explore our extensive collection of package documentation.
                </h1>

            </div>
        </div>
    </section>

    <section class="relative py-16 overflow-hidden bg-vanilla">
        <div class="max-w-screen-xl px-4 mx-auto sm:px-6 lg:px-8">
            <div class="relative items-center w-full max-w-lg mx-auto sm:max-w-xl md:max-w-2xl lg:mx-0 lg:max-w-none lg:gap-12">

                <div class="not-prose mt-4 grid grid-cols-1 gap-x-6 gap-y-10 border-t border-zinc-900/5 pt-10 dark:border-white/5 sm:grid-cols-2 xl:max-w-none xl:grid-cols-3">

                    <?php $__currentLoopData = $repositories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $repository): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $firstAlias = $repository->aliases->first();
                            $firstPage = $firstAlias?->pages->first();
                            $hasDocumentation = $firstAlias && $firstPage;
                        ?>

                        <?php if($hasDocumentation): ?>
                            <div class="flex flex-row-reverse gap-6">
                                <div class="flex-auto">
                                    <h3 class="text-sm font-semibold text-zinc-900 dark:text-white">
                                        <?php echo e($repository->fullName ?? ucfirst($repository->slug)); ?>

                                    </h3>
                                    <p class="mt-1 text-sm text-zinc-600 dark:text-zinc-400">
                                        <?php echo e($repository->description ?? $repository->category); ?>

                                    </p>
                                    <p class="mt-4"><a
                                                class="inline-flex gap-0.5 justify-center overflow-hidden text-sm font-medium transition text-emerald-500 hover:text-emerald-600 dark:text-emerald-400 dark:hover:text-emerald-500"
                                                href="<?php echo e(route('docs.show', [$repository->slug, $firstAlias->slug, $firstPage->slug])); ?>">Documentation
                                            <svg viewBox="0 0 20 20" fill="none" aria-hidden="true"
                                                 class="mt-0.5 h-5 w-5 relative top-px -mr-1">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                      d="m11.5 6.5 3 3.5m0 0-3 3.5m3-3.5h-9"></path>
                                            </svg>
                                        </a></p>
                                </div>
                                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('bi-github'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(BladeUI\Icons\Components\Svg::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-10 w-10']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                            </div>
                        <?php endif; ?>
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
<?php /**PATH /Users/kunle/Herd/maylancer/resources/views/frontpage/docs/index.blade.php ENDPATH**/ ?>