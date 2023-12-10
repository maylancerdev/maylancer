<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <?php echo e(__('Billing')); ?>

        </h2>
     <?php $__env->endSlot(); ?>


    <div class="mx-auto max-w-7xl lg:flex lg:gap-x-16 lg:px-8">
        <?php if (isset($component)) { $__componentOriginal2880b66d47486b4bfeaf519598a469d6 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.sidebar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2880b66d47486b4bfeaf519598a469d6)): ?>
<?php $component = $__componentOriginal2880b66d47486b4bfeaf519598a469d6; ?>
<?php unset($__componentOriginal2880b66d47486b4bfeaf519598a469d6); ?>
<?php endif; ?>

        <main class="px-4 py-16 sm:px-6 lg:flex-auto lg:px-0 lg:py-20">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-900 shadow sm:rounded-lg border-2">
                <div class="max-w-xl">
                    <section class="space-y-6">
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                <?php echo e(__('Billing')); ?>

                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                <?php echo e(__('No outstanding bills and your payments up to date. Thank you for your promptness.')); ?>

                            </p>
                        </header>

                        <div>


                        </div>
                    </section>
                </div>
            </div>


            <div class="p-4 sm:p-8 bg-white dark:bg-gray-900 shadow sm:rounded-lg border-2 mt-10">
                <div class="max-w-xl">
                    <section class="space-y-6">
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                <?php echo e(__('  Add payment method')); ?>

                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                <?php echo e(__('Secure and convenient automatic payment method')); ?>

                            </p>
                        </header>

                        <div>
                            <div>

                                <form class="pt-6 pb-8 mb-4">
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                                            Full Name
                                        </label>
                                        <input
                                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                id="name" type="text" placeholder="Enter your legal full name">
                                    </div>

                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="address">
                                            Address
                                        </label>
                                        <input
                                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                id="address" type="text" placeholder="Enter your address">
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="city">
                                            City
                                        </label>
                                        <input
                                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                id="city" type="text" placeholder="Enter your city">
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="state">
                                            State/Province
                                        </label>
                                        <input
                                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                id="state" type="text" placeholder="Enter your state/province">
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="zip">
                                            ZIP/Postal Code
                                        </label>
                                        <input
                                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                id="zip" type="text" placeholder="Enter your ZIP/postal code">
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="card-number">
                                            Card Number
                                        </label>
                                        <input
                                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                id="card-number" type="text" placeholder="Enter your card number">
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="expiration-date">
                                            Expiration Date
                                        </label>
                                        <input
                                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                id="expiration-date" type="text" placeholder="Enter expiration date">
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="cvv">
                                            CVV/CVC
                                        </label>
                                        <input
                                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                id="cvv" type="text" placeholder="Enter CVV/CVC">
                                    </div>
                                    <div class="mt-3">
                                        <button
                                                class="inline-flex justify-center px-5 py-2.5 text-base font-medium duration-150 ease-in-out hover:bg-slate-800 group items-center justify-center bg-slate-700 text-white hover:bg-slate-900 rounded focus:outline-none focus:shadow-outline"
                                                type="submit">
                                            Submit
                                        </button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </section>
                </div>
            </div>
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-900 shadow sm:rounded-lg border-2 mt-10">
                <div class="">
                    <section class="space-y-6">
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                <?php echo e(__('PAYMENT HISTORY')); ?>

                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                <?php echo e(__('Below, you can find your payment history.')); ?>

                            </p>
                        </header>

                        <div>
                            <div class="w-full">
                                <table class="min-w-full border-collapse table-auto">
                                    <thead>
                                    <tr class="bg-gray-200">
                                        <th class="py-2 px-4 border-b">Date</th>
                                        <th class="py-2 px-4 border-b">Amount</th>
                                        <th class="py-2 px-4 border-b">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <!-- Add payment history rows here -->
                                    </tbody>
                                    <!-- Show empty state when no payment history is available -->
                                    <tfoot>
                                    <tr>
                                        <td colspan="3" class="py-4 px-4 text-gray-500 text-center">
                                            No payment history available.
                                        </td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                    </section>

                </div>
            </div>

        </main>
    </div>


 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\laragon\www\maylancer-nova\resources\views/profile/billing.blade.php ENDPATH**/ ?>