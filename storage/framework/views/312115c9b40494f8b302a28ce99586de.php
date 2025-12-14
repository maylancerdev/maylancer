<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
     'link' => '',
    ]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
     'link' => '',
    ]); ?>
<?php foreach (array_filter(([
     'link' => '',
    ]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php

 $active = request()->routeIs($link) ? 'font-bold text-amber-900/70 bg-amber-50' : ''

?>
<a
    href="<?php echo e(route($link)); ?>" <?php echo e($attributes->merge(['class' => 'font-medium text-slate-700 hover:bg-amber-50 hover:text-slate-900 '.$active])); ?>

>
    <?php echo e($slot); ?>

</a>
<?php /**PATH /Users/kunle/Herd/maylancer/resources/views/components/front/anchor-link.blade.php ENDPATH**/ ?>