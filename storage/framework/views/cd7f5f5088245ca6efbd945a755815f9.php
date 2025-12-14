<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="min-h-screen bg-gray-50 dark:bg-slate-950" x-data="{ sidebarOpen: false }">
        <!-- Mobile Menu Button -->
        <button
            @click="sidebarOpen = true"
            class="lg:hidden fixed bottom-6 right-6 z-40 p-4 bg-indigo-600 hover:bg-indigo-700 text-white rounded-full shadow-lg transition-colors"
            aria-label="Open navigation menu"
        >
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>

        <!-- Mobile Overlay -->
        <div
            x-show="sidebarOpen"
            x-transition:enter="transition-opacity ease-linear duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-linear duration-300"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            @click="sidebarOpen = false"
            class="lg:hidden fixed inset-0 bg-gray-900 bg-opacity-50 z-40"
            style="display: none;"
        ></div>

        <!-- Breadcrumbs -->
        <div class="bg-white dark:bg-slate-900 border-b border-gray-200 dark:border-slate-800">
            <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
                <?php echo $__env->make('frontpage.docs.partials.breadcrumbs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>

        <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex">
                <!-- Left Sidebar - Navigation -->
                <aside
                    x-bind:class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
                    class="fixed lg:sticky top-0 left-0 z-50 lg:z-auto w-72 h-screen overflow-y-auto border-r border-gray-200 dark:border-slate-800 bg-white dark:bg-slate-900 transform transition-transform duration-300 ease-in-out lg:block"
                >
                    <!-- Close Button (Mobile Only) -->
                    <button
                        @click="sidebarOpen = false"
                        class="lg:hidden absolute top-4 right-4 p-2 text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200"
                        aria-label="Close navigation menu"
                    >
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>

                    <?php echo $__env->make('frontpage.docs.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </aside>

                <!-- Main Content -->
                <main class="flex-1 min-w-0 px-8 py-12 lg:px-12 xl:px-16">
                    <?php echo $__env->make('frontpage.docs.partials.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </main>

                <!-- Right Sidebar - On This Page -->
                <aside class="hidden xl:block w-64 border-l border-gray-200 dark:border-slate-800 bg-white dark:bg-slate-900 sticky top-0 h-screen overflow-y-auto px-6 py-12">
                    <?php echo $__env->make('frontpage.docs.partials.on-page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </aside>
            </div>
        </div>
    </div>

    <!-- Search Modal -->
    <?php if (isset($component)) { $__componentOriginalcedca13ce10c75eb66af342dbaf4454a = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.search-modal','data' => ['name' => 'search-modal']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('search-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'search-modal']); ?>
        <?php echo $__env->make('frontpage.docs.partials.search-modal-content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcedca13ce10c75eb66af342dbaf4454a)): ?>
<?php $component = $__componentOriginalcedca13ce10c75eb66af342dbaf4454a; ?>
<?php unset($__componentOriginalcedca13ce10c75eb66af342dbaf4454a); ?>
<?php endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH /Users/kunle/Herd/maylancer/resources/views/frontpage/docs/show.blade.php ENDPATH**/ ?>