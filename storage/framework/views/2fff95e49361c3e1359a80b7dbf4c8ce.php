<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <!-- Home Hero -->
    <?php if (isset($component)) { $__componentOriginal653e6ab4856afb83ed702cb8c29faecd = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'frontpage.components.home-hero','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('home-hero'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal653e6ab4856afb83ed702cb8c29faecd)): ?>
<?php $component = $__componentOriginal653e6ab4856afb83ed702cb8c29faecd; ?>
<?php unset($__componentOriginal653e6ab4856afb83ed702cb8c29faecd); ?>
<?php endif; ?>

    <!-- Featured -->
    <?php if (isset($component)) { $__componentOriginal9abb05317db0504c08a9e5a577de189e = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'frontpage.components.featured','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('home-featured'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9abb05317db0504c08a9e5a577de189e)): ?>
<?php $component = $__componentOriginal9abb05317db0504c08a9e5a577de189e; ?>
<?php unset($__componentOriginal9abb05317db0504c08a9e5a577de189e); ?>
<?php endif; ?>

    <!-- Product Showcase -->
    <?php if (isset($component)) { $__componentOriginal9de56300e6c782be1fc2edf1ba8a183a = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'frontpage.components.about-blocks','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('home-about-blocks'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9de56300e6c782be1fc2edf1ba8a183a)): ?>
<?php $component = $__componentOriginal9de56300e6c782be1fc2edf1ba8a183a; ?>
<?php unset($__componentOriginal9de56300e6c782be1fc2edf1ba8a183a); ?>
<?php endif; ?>

    <!-- Features products -->
    <?php if (isset($component)) { $__componentOriginal86b96782491021d00993443db7105fe8 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'frontpage.components.selection','data' => ['products' => $products]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('home-selection'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['products' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($products)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal86b96782491021d00993443db7105fe8)): ?>
<?php $component = $__componentOriginal86b96782491021d00993443db7105fe8; ?>
<?php unset($__componentOriginal86b96782491021d00993443db7105fe8); ?>
<?php endif; ?>

    <!-- Hire  Team -->
    <?php if (isset($component)) { $__componentOriginal6643610b5bd8094290bfc0b0fc54c328 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'frontpage.components.hire','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('home-hire'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6643610b5bd8094290bfc0b0fc54c328)): ?>
<?php $component = $__componentOriginal6643610b5bd8094290bfc0b0fc54c328; ?>
<?php unset($__componentOriginal6643610b5bd8094290bfc0b0fc54c328); ?>
<?php endif; ?>

    <!-- Testimonials -->
    <?php if (isset($component)) { $__componentOriginale868109ca36618e73eb85c7cefef2904 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'frontpage.components.testimonials','data' => ['groupedTestimonies' => $groupedTestimonies]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('home-testimonials'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['groupedTestimonies' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($groupedTestimonies)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale868109ca36618e73eb85c7cefef2904)): ?>
<?php $component = $__componentOriginale868109ca36618e73eb85c7cefef2904; ?>
<?php unset($__componentOriginale868109ca36618e73eb85c7cefef2904); ?>
<?php endif; ?>

    <!-- Newsletter-->
    <?php if (isset($component)) { $__componentOriginal63797c7bf5b0743e57e2ae51d7046db2 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'frontpage.components.newsletter','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('home-newsletter'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal63797c7bf5b0743e57e2ae51d7046db2)): ?>
<?php $component = $__componentOriginal63797c7bf5b0743e57e2ae51d7046db2; ?>
<?php unset($__componentOriginal63797c7bf5b0743e57e2ae51d7046db2); ?>
<?php endif; ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH /Users/kunle/Herd/maylancer/resources/views/frontpage/index.blade.php ENDPATH**/ ?>