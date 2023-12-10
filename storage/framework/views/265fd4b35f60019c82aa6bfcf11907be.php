<div class="min-w-0 col-span-5 sm:col-span-3 md:col-span-3 lg:col-span-3 max-w-2xl flex-auto px-4 py-16 lg:max-w-none lg:pl-8 lg:pr-0 xl:px-16">
    <article class="mb-10 markup">

        <?php if (isset($component)) { $__componentOriginala34739ed841f5abb15f9ae866e7de907 = $component; } ?>
<?php $component = BladeUIKit\Components\Markdown\Markdown::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('markdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(BladeUIKit\Components\Markdown\Markdown::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'not-format']); ?>
           <?php echo $content; ?>

        <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala34739ed841f5abb15f9ae866e7de907)): ?>
<?php $component = $__componentOriginala34739ed841f5abb15f9ae866e7de907; ?>
<?php unset($__componentOriginala34739ed841f5abb15f9ae866e7de907); ?>
<?php endif; ?>

    </article>

</div><?php /**PATH C:\laragon\www\maylancer-nova\resources\views/frontpage/docs/partials/content.blade.php ENDPATH**/ ?>