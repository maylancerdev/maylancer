<header
    class="relative h-24 bg-amber-100"
    x-data="{ mobileMenuOpen: false }"
>
    <!-- Main navbar for large screens -->
    <div
        class="relative z-30 flex items-center w-full h-full max-w-screen-xl px-4 mx-auto border-b border-gray-secondary-300/60 bg-amber-100 sm:px-6 lg:px-8"
    >
        <nav class="flex items-center justify-between w-full">
            <div class="flex items-center space-x-8 lg:space-x-12">
                <!-- Logo-->

                <?php if (isset($component)) { $__componentOriginale81e3b71918b75a8a2c878d5a0434b26 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.front.logo','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('front.logo'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale81e3b71918b75a8a2c878d5a0434b26)): ?>
<?php $component = $__componentOriginale81e3b71918b75a8a2c878d5a0434b26; ?>
<?php unset($__componentOriginale81e3b71918b75a8a2c878d5a0434b26); ?>
<?php endif; ?>

                <div class="items-center hidden space-x-3 md:flex lg:space-x-4">
                    <?php if (isset($component)) { $__componentOriginald7682969ddebc325701cd1e6df1f037a = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.front.anchor-link','data' => ['class' => 'inline-block px-4 py-2','link' => 'product']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('front.anchor-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'inline-block px-4 py-2','link' => 'product']); ?> Products  <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald7682969ddebc325701cd1e6df1f037a)): ?>
<?php $component = $__componentOriginald7682969ddebc325701cd1e6df1f037a; ?>
<?php unset($__componentOriginald7682969ddebc325701cd1e6df1f037a); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginald7682969ddebc325701cd1e6df1f037a = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.front.anchor-link','data' => ['class' => 'inline-block px-4 py-2','link' => 'open-source']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('front.anchor-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'inline-block px-4 py-2','link' => 'open-source']); ?> Open Source  <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald7682969ddebc325701cd1e6df1f037a)): ?>
<?php $component = $__componentOriginald7682969ddebc325701cd1e6df1f037a; ?>
<?php unset($__componentOriginald7682969ddebc325701cd1e6df1f037a); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginald7682969ddebc325701cd1e6df1f037a = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.front.anchor-link','data' => ['class' => 'inline-block px-4 py-2','link' => 'blog.index']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('front.anchor-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'inline-block px-4 py-2','link' => 'blog.index']); ?> Blog  <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald7682969ddebc325701cd1e6df1f037a)): ?>
<?php $component = $__componentOriginald7682969ddebc325701cd1e6df1f037a; ?>
<?php unset($__componentOriginald7682969ddebc325701cd1e6df1f037a); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginald7682969ddebc325701cd1e6df1f037a = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.front.anchor-link','data' => ['class' => 'inline-block px-4 py-2','link' => 'vacancies']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('front.anchor-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'inline-block px-4 py-2','link' => 'vacancies']); ?> Vacancies  <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald7682969ddebc325701cd1e6df1f037a)): ?>
<?php $component = $__componentOriginald7682969ddebc325701cd1e6df1f037a; ?>
<?php unset($__componentOriginald7682969ddebc325701cd1e6df1f037a); ?>
<?php endif; ?>


                </div>
            </div>

            <div>
                <div class="flex items-center space-x-4">
                    <div class="hidden lg:block">
                        <?php if (isset($component)) { $__componentOriginald7682969ddebc325701cd1e6df1f037a = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.front.anchor-link','data' => ['class' => 'inline-block px-4 py-2','link' => 'web-development']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('front.anchor-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'inline-block px-4 py-2','link' => 'web-development']); ?> Web Development  <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald7682969ddebc325701cd1e6df1f037a)): ?>
<?php $component = $__componentOriginald7682969ddebc325701cd1e6df1f037a; ?>
<?php unset($__componentOriginald7682969ddebc325701cd1e6df1f037a); ?>
<?php endif; ?>

                    </div>
                    <?php if(auth()->guard()->check()): ?>
                        <?php if (isset($component)) { $__componentOriginalbf37d9bf137448eb795c3ef0588480f6 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.front.dark-button','data' => ['class' => 'group items-center justify-center bg-slate-700 text-white hover:bg-slate-900','link' => 'dashboard']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('front.dark-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'group items-center justify-center bg-slate-700 text-white hover:bg-slate-900','link' => 'dashboard']); ?>Account <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbf37d9bf137448eb795c3ef0588480f6)): ?>
<?php $component = $__componentOriginalbf37d9bf137448eb795c3ef0588480f6; ?>
<?php unset($__componentOriginalbf37d9bf137448eb795c3ef0588480f6); ?>
<?php endif; ?>
                    <?php else: ?>
                        <?php if (isset($component)) { $__componentOriginalbf37d9bf137448eb795c3ef0588480f6 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.front.dark-button','data' => ['class' => 'group items-center justify-center bg-slate-700 text-white hover:bg-slate-900','link' => 'login']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('front.dark-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'group items-center justify-center bg-slate-700 text-white hover:bg-slate-900','link' => 'login']); ?>Sign in <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbf37d9bf137448eb795c3ef0588480f6)): ?>
<?php $component = $__componentOriginalbf37d9bf137448eb795c3ef0588480f6; ?>
<?php unset($__componentOriginalbf37d9bf137448eb795c3ef0588480f6); ?>
<?php endif; ?>
                    <?php endif; ?>



                    <div class="md:hidden">
                        <div>
                            <button
                                class="flex items-center justify-center p-3 transition duration-300 ease-in-out border cursor-pointer group border-gray-secondary-400/75 bg-gray-secondary-50 focus:outline-none"
                                aria-label="Toggle Navigation"
                                @click="mobileMenuOpen=!mobileMenuOpen"
                            >
                    <span
                        class="relative h-3.5 w-4 transform transition duration-500 ease-in-out"
                    >
                      <span
                          class="absolute top-0 left-0 block h-0.5 w-full rotate-0 transform rounded-full bg-slate-600 opacity-100 transition duration-300 ease-in-out group-hover:bg-slate-900"
                          :class="{ 'w-0 top-1.5 left-1/2': mobileMenuOpen }"
                      ></span>
                      <span
                          class="absolute left-0 top-1.5 block h-0.5 w-full rotate-0 transform rounded-full bg-slate-600 opacity-100 transition duration-300 ease-in-out group-hover:bg-gray-900"
                          :class="{ 'rotate-45': mobileMenuOpen }"
                      ></span>
                      <span
                          class="absolute left-0 top-1.5 block h-0.5 w-full rotate-0 transform rounded-full bg-slate-600 opacity-100 transition duration-300 ease-in-out group-hover:bg-gray-900"
                          :class="{ '-rotate-45': mobileMenuOpen }"
                      ></span>
                      <span
                          class="absolute left-0 top-3 block h-0.5 w-full rotate-0 transform rounded-full bg-slate-600 opacity-100 transition duration-300 ease-in-out group-hover:bg-gray-900"
                          :class="{ 'w-0 top-1.5 left-1/2': mobileMenuOpen }"
                      ></span>
                    </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <!-- Mobile Menu-->
    <div class="md:hidden">
        <div
            x-show="mobileMenuOpen"
            x-transition:enter="duration-200 ease-out"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="duration-200 ease-in"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-20 bg-opacity-25 bg-slate-900 backdrop-blur"
        ></div>

        <div
            x-show="mobileMenuOpen"
            x-transition:enter="duration-300 ease-out"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="duration-200 ease-in"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="absolute inset-x-0 z-30 px-5 pt-4 pb-8 overflow-hidden duration-300 top-24 bg-amber-100"
            @click.away="mobileMenuOpen = true"
        >
            <div>
                <div>
                    <div class="flex flex-col divide-y divide-gray-secondary-400/75">

                        <?php if (isset($component)) { $__componentOriginald7682969ddebc325701cd1e6df1f037a = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.front.anchor-link','data' => ['class' => 'block px-4 pt-4 pb-2','link' => 'product']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('front.anchor-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'block px-4 pt-4 pb-2','link' => 'product']); ?> Product  <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald7682969ddebc325701cd1e6df1f037a)): ?>
<?php $component = $__componentOriginald7682969ddebc325701cd1e6df1f037a; ?>
<?php unset($__componentOriginald7682969ddebc325701cd1e6df1f037a); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginald7682969ddebc325701cd1e6df1f037a = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.front.anchor-link','data' => ['class' => 'block px-4 pt-4 pb-2','link' => 'open-source']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('front.anchor-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'block px-4 pt-4 pb-2','link' => 'open-source']); ?> Open Source  <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald7682969ddebc325701cd1e6df1f037a)): ?>
<?php $component = $__componentOriginald7682969ddebc325701cd1e6df1f037a; ?>
<?php unset($__componentOriginald7682969ddebc325701cd1e6df1f037a); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginald7682969ddebc325701cd1e6df1f037a = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.front.anchor-link','data' => ['class' => 'block px-4 pt-4 pb-2','link' => 'blog.index']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('front.anchor-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'block px-4 pt-4 pb-2','link' => 'blog.index']); ?> Blog  <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald7682969ddebc325701cd1e6df1f037a)): ?>
<?php $component = $__componentOriginald7682969ddebc325701cd1e6df1f037a; ?>
<?php unset($__componentOriginald7682969ddebc325701cd1e6df1f037a); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginald7682969ddebc325701cd1e6df1f037a = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.front.anchor-link','data' => ['class' => 'block px-4 pt-4 pb-2','link' => 'vacancies']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('front.anchor-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'block px-4 pt-4 pb-2','link' => 'vacancies']); ?> Vacancies  <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald7682969ddebc325701cd1e6df1f037a)): ?>
<?php $component = $__componentOriginald7682969ddebc325701cd1e6df1f037a; ?>
<?php unset($__componentOriginald7682969ddebc325701cd1e6df1f037a); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginald7682969ddebc325701cd1e6df1f037a = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.front.anchor-link','data' => ['class' => 'block px-4 pt-4 pb-2','link' => 'web-development']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('front.anchor-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'block px-4 pt-4 pb-2','link' => 'web-development']); ?> Web Development  <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald7682969ddebc325701cd1e6df1f037a)): ?>
<?php $component = $__componentOriginald7682969ddebc325701cd1e6df1f037a; ?>
<?php unset($__componentOriginald7682969ddebc325701cd1e6df1f037a); ?>
<?php endif; ?>

                    </div>
                    <div class="mt-6">
                        <?php if(auth()->guard()->check()): ?>
                            <?php if (isset($component)) { $__componentOriginalbf37d9bf137448eb795c3ef0588480f6 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.front.dark-button','data' => ['class' => 'border w-full border-slate-800 text-slate-800 hover:text-white','link' => 'dashboard']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('front.dark-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'border w-full border-slate-800 text-slate-800 hover:text-white','link' => 'dashboard']); ?>Account <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbf37d9bf137448eb795c3ef0588480f6)): ?>
<?php $component = $__componentOriginalbf37d9bf137448eb795c3ef0588480f6; ?>
<?php unset($__componentOriginalbf37d9bf137448eb795c3ef0588480f6); ?>
<?php endif; ?>
                        <?php else: ?>
                            <?php if (isset($component)) { $__componentOriginalbf37d9bf137448eb795c3ef0588480f6 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.front.dark-button','data' => ['class' => 'border w-full border-slate-800 text-slate-800 hover:text-white','link' => 'login']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('front.dark-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'border w-full border-slate-800 text-slate-800 hover:text-white','link' => 'login']); ?>Sign in <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbf37d9bf137448eb795c3ef0588480f6)): ?>
<?php $component = $__componentOriginalbf37d9bf137448eb795c3ef0588480f6; ?>
<?php unset($__componentOriginalbf37d9bf137448eb795c3ef0588480f6); ?>
<?php endif; ?>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<?php /**PATH /Users/kunle/Herd/maylancer/resources/views/layouts/navigation.blade.php ENDPATH**/ ?>