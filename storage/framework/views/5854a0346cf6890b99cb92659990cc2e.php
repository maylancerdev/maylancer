<?php if(count($tableOfContents)): ?>
    <aside class="xl:sticky xl:top-[4.5rem] sticky overflow-hidden self-start xl:-mr-6 xl:block xl:flex-none xl:overflow-y-auto xl:pr-6 hidden lg:block md:block">
    <nav aria-labelledby="on-this-page-title" class="onPage w-56 border-l-2 pl-2">
        <h2 id="on-this-page-title" class="mb-3 text-gray font-semibold uppercase tracking-wider text-xs">
            On this page</h2>
        <ol role="list" class="mt-4 space-y-3 text-sm">
            <?php $__currentLoopData = $tableOfContents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fragment => $title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="text-sm">
                    <a href="#<?php echo e($title['id']); ?>" class="docs-submenu-item">
                        <?php echo e($title['text']); ?>

                    </a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        </ol>
    </nav>
</aside>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var navLinks = document.querySelectorAll('.onPage ol li a');
            var sectionOffsets = Array.from(navLinks).map(function(link) {
                var href = link.getAttribute('href');
                var target = document.querySelector(href);
                if (target) {
                    return target.offsetTop;
                }
            });

            window.addEventListener('scroll', function() {
                var currentPosition = window.scrollY + (window.innerHeight / 2);
                var activeSectionIndex = sectionOffsets.map(function(offset) {
                    if (currentPosition >= offset) {
                        return offset;
                    }
                }).filter(function(offset) {
                    return offset !== undefined; // Filter out undefined values
                }).length - 1;

                navLinks.forEach(function(link) {
                    link.classList.remove('text-sky-500');
                });

                if (activeSectionIndex >= 0 && activeSectionIndex < navLinks.length) {
                    navLinks[activeSectionIndex].classList.add('text-sky-500');
                }
            });
        });


    </script>

<?php endif; ?>
<?php /**PATH C:\laragon\www\maylancer-nova\resources\views/frontpage/docs/partials/on-page.blade.php ENDPATH**/ ?>