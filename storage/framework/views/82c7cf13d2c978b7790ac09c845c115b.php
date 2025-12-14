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
                    Explore our <br>team's latest insights
                </h1>
                <h1
                        class="font-semibold leading-snug mb-8 md:max-w-4xl md:mx-auto mt-2 sm:leading-snug text-2xl text-center text-slate-900 xl:mx-0"
                >
                    A curated collection of articles from our personal blogs.
                </h1>

            </div>
        </div>
    </section>


    <section class="mb-52">
        <div class="bg-white">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto mt-16 max-w-2xl  gap-x-8 gap-y-20 lg:mx-0 lg:max-w-none blog">

                    <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="py-12">
                                <article>
                                    <div class="space-y-2 xl:grid xl:grid-cols-4 xl:items-baseline xl:space-y-0">
                                        <dl>
                                            <dt class="sr-only">Published on</dt>
                                            <dd class="text-base font-medium leading-6 text-gray-500 dark:text-gray-400">
                                                <time datetime="2021-08-07T15:32:14.000Z"><?php echo e($post->publishedDate); ?></time>
                                            </dd>
                                        </dl>
                                        <div class="space-y-5 xl:col-span-3">
                                            <div class="space-y-6">
                                                <div>
                                                    <h2 class="text-2xl font-bold leading-8 tracking-tight"><a
                                                                class="text-gray-900 dark:text-gray-100"
                                                                href="<?php echo e($post->url); ?>"
                                                                <?php if(!$post->isOriginal): ?> target="_BLANK" <?php endif; ?>><?php echo e($post->title); ?></a>
                                                    </h2>
                                                    <div class="flex flex-wrap">
                                                        <?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <a class="mr-3 font-medium uppercase inline-flex rounded-full bg-yellow-100 px-2 py-1 text-xs"
                                                               href="<?php echo e(route('blog.index', ['tag' => $tag->name])); ?>"><?php echo e(Str::ucfirst($tag->name)); ?></a>

                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                </div>
                                                <div class="prose max-w-none text-gray-500 dark:text-gray-400">
                                                    <?php echo e($post->description); ?>

                                                </div>
                                            </div>
                                            <div class="text-base font-medium leading-6">
                                                <a
                                                        class="flex text-primary-500 hover:text-primary-600 dark:hover:text-primary-400"
                                                        aria-label="Read &quot;New features in v1&quot;"
                                                        href="<?php echo e($post->url); ?>" <?php if(!$post->isOriginal): ?> target="_BLANK" <?php endif; ?>>
                                                        <?php echo e($post->isOriginal ?  __('Read more') : getDomain($post->url)); ?>

                                                    <?php if($post->isOriginal): ?>
                                                        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('bi-arrow-right'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(BladeUI\Icons\Components\Svg::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'bi bi-arrow-right mt-1.5 ml-1.5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                                                        <?php else: ?>

                                                          <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('fas-external-link-alt'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(BladeUI\Icons\Components\Svg::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'bi bi-arrow-right mt-1.5 ml-1.5','width' => '12','height' => '12']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>

                                                        <?php endif; ?>

                                                </a></div>
                                        </div>
                                    </div>
                                </article>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>


                    <div class="mt-20">

                        <?php echo e($posts->links()); ?>

                    </div>

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
<?php /**PATH /Users/kunle/Herd/maylancer/resources/views/frontpage/blog/index.blade.php ENDPATH**/ ?>