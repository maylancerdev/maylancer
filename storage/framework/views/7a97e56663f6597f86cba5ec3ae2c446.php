<div class="px-6 py-8">
    <!-- Search -->
    <div class="mb-8">
        <div class="relative">
            <input
                type="text"
                placeholder="Search"
                readonly
                x-data="{}"
                x-on:click.prevent="$store.modals.open('search-modal')"
                class="w-full pl-8 pr-16 py-2 text-sm bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-lg text-gray-900 dark:text-gray-100 placeholder-gray-400 cursor-pointer hover:border-indigo-500 dark:hover:border-indigo-500 focus:outline-none transition-colors"
                autocomplete="off"
            >
            <svg class="w-4 h-4 absolute left-2.5 top-2.5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m-4 2a6 6 0 1 1 0-12 6 6 0 0 1 0 12Z"/>
            </svg>
            <kbd class="absolute right-2 top-1.5 px-2 py-1 text-xs font-semibold text-gray-500 dark:text-gray-400 bg-gray-100 dark:bg-slate-700 border border-gray-200 dark:border-slate-600 rounded">⌘K</kbd>
        </div>
    </div>

    <!-- Version Selector -->
    <?php echo $__env->make('frontpage.docs.partials.version', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Navigation -->
    <?php if($toc): ?>
        <nav id="docNav" data-current-page="<?php echo e($page->slug ?? $page); ?>">
            <?php echo $toc; ?>

        </nav>
    <?php endif; ?>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Global keyboard shortcut for search modal
    document.addEventListener('keydown', function(e) {
        if ((e.metaKey || e.ctrlKey) && e.key === 'k') {
            e.preventDefault();
            Alpine.store('modals').open('search-modal');
        }
    });
});
</script>
<?php /**PATH /Users/kunle/Herd/maylancer/resources/views/frontpage/docs/partials/sidebar.blade.php ENDPATH**/ ?>