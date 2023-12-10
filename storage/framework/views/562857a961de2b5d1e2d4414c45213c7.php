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
    <!-- Heading Container -->
    <div class="max-w-screen-xl px-4 mx-auto sm:px-6 lg:px-8">
        <div
            class="flex flex-col items-center max-w-lg mx-auto sm:max-w-xl md:max-w-2xl lg:mx-0 lg:max-w-none"
        >
            <h1
                class="text-4xl font-semibold leading-snug text-center text-slate-900 sm:text-5xl sm:leading-snug md:mx-auto md:max-w-4xl xl:mx-0"
            >
                <?php echo e(__('Contact us')); ?>

            </h1>
            <p
                class="max-w-xl mx-auto mt-5 text-lg leading-relaxed text-center text-slate-700 sm:mt-6"
            >
                <?php echo e(__('Embark on a transformative journey by engaging our esteemed website development team. Together, let us actualize your digital vision and establish a robust connection')); ?>

            </p>
        </div>
    </div>

    <div class="relative pt-16">
        <!-- Background -->
        <div class="absolute inset-0 flex flex-col" aria-hidden="true">
            <div class="flex-1 bg-amber-100"></div>
            <div class="flex-1 w-full bg-vanilla"></div>
            <div class="flex-1 bg-vanilla"></div>
        </div>

        <!-- Contact Cards Container -->
        <div class="max-w-screen-xl px-4 mx-auto sm:px-6 lg:px-8">
            <!-- Contact Cards -->
            <div
                class="gap-x-6 gap-y-8 grid lg:gap-x-8 lg:max-w-none lg:mx-0 max-w-lg md:max-w-2xl mx-auto relative sm:max-w-xl"
            >
                <!-- Card 1 -->
               <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('contact.contact', []);

$__html = app('livewire')->mount($__name, $__params, 'W8irGu7', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>


            </div>
        </div>
    </div>

    <div class="h-16 bg-vanilla sm:h-24"></div>
    </section>


    <!-- Contact Information -->
    <section class="relative py-16 bg-vanilla sm:py-20">
        <!-- Container -->
        <div class="max-w-screen-xl px-4 mx-auto sm:px-6 lg:px-8">
            <div
                class="grid items-center max-w-lg gap-12 mx-auto sm:max-w-xl md:max-w-2xl lg:mx-0 lg:max-w-none lg:grid-cols-12"
            >
                <div class="lg:col-span-5">
                    <h1
                        class="text-4xl font-semibold leading-snug text-slate-900 sm:text-[40px] sm:leading-snug xl:mx-0"
                    >
                        Contact Information
                    </h1>
                    <p class="max-w-sm mt-4 leading-relaxed text-slate-700 lg:mt-5">
                        We value your feedback and inquiries, and we will do our best to respond promptly. Don't hesitate to contact us using your preferred communication channel.
                    </p>
                </div>

                <!-- Contact Cards -->
                <div
                    class="grid gap-6 sm:grid-cols-2 lg:col-span-7 lg:gap-5 xl:gap-8"
                >

                    <?php $__currentLoopData = config('settings.contact'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div
                            class="px-6 py-8 border border-gray-secondary-400/60 bg-gray-secondary-50 xl:p-10"
                        >
                            <div class="flex space-x-6 xl:space-x-8">
                                <?php echo $contact['icon']; ?>

                                <div>
                                    <h3 class="text-xl font-semibold text-slate-900">
                                        <?php echo e($contact['label']); ?>

                                    </h3>
                                    <p class="mt-6 font-medium text-md text-slate-900">
                                        <?php echo e($contact['contact_type']); ?>:
                                    </p>
                                    <p class="mt-1 text-sm text-slate-700"> <?php echo e($contact['contact']); ?></p>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                </div>
            </div>
        </div>
    </section>

    <!-- Map -->
    <section class="relative py-16 bg-vanilla sm:py-20">
        <!-- Container -->
        <div class="max-w-screen-xl px-4 mx-auto sm:px-6 lg:px-8">
            <div
                class="max-w-lg mx-auto sm:max-w-xl md:max-w-2xl lg:mx-0 lg:max-w-none"
            >
                <!-- Heading -->
                <div class="flex flex-col items-center lg:items-start">
                    <p
                        class="flex items-center space-x-3.5 text-xl font-medium text-amber-900/70"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="28"
                            height="3"
                            viewBox="0 0 28 3"
                            fill="none"
                        >
                            <line
                                y1="1.5"
                                x2="28"
                                y2="1.5"
                                stroke="currentColor"
                                strokeOpacity="0.65"
                                strokeWidth="3"
                            />
                        </svg>

                        <span>Our office</span>
                    </p>
                    <h1
                        class="mt-3 text-center text-4xl font-semibold leading-snug text-slate-900 sm:mt-4 sm:max-w-xl sm:text-[40px] sm:leading-snug md:mx-auto lg:mx-0 lg:text-left"
                    >
                        Come and visit us
                    </h1>
                </div>

                <!-- Map -->
                <div class="relative mt-12 sm:mt-16 lg:mt-20">
                    <img
                        src="<?php echo e(asset(config('settings.contact_extra.google_map_image_view'))); ?>"
                        alt="Map"
                        class="object-cover object-center h-auto lg:w-5/6"
                    />

                    <!-- Address Card -->
                    <div
                        class="flex flex-col p-8 border border-gray-secondary-400/60 bg-gray-secondary-50 sm:flex-row sm:items-center sm:justify-between sm:p-10 lg:absolute lg:right-0 lg:top-1/2 lg:w-1/3 lg:-translate-y-1/2 lg:flex-col lg:items-start"
                    >
                        <div>
                            <h3 class="text-2xl font-semibold text-slate-900">
                                <?php echo e(config()->get('app.name')); ?> Offices
                            </h3>
                            <p class="mt-5 leading-relaxed text-slate-700">
                                <?php echo config('settings.contact_extra.office_address'); ?>

                            </p>
                        </div>

                        <a
                            href="<?php echo e(config('settings.contact_extra.contact_address_goggle_map')); ?>"
                            target="_blank"
                            class="group mt-8 inline-flex w-auto items-center justify-center border border-slate-800 px-5 py-2.5 text-base font-medium text-slate-800 duration-150 ease-in-out hover:bg-slate-800 hover:text-white sm:mt-0 lg:mt-8"
                        >
                            View on Google Maps
                        </a>
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
<?php /**PATH C:\laragon\www\maylancer-nova\resources\views/frontpage/contact/index.blade.php ENDPATH**/ ?>