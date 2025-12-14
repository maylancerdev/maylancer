<?php if(count($tableOfContents)): ?>
    <div>
        <h2 class="text-sm font-semibold text-gray-900 dark:text-white mb-4">
            On this page
        </h2>
        <ul class="space-y-2.5 text-sm">
            <?php $__currentLoopData = $tableOfContents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <a href="#<?php echo e($item['id']); ?>"
                       class="toc-link block text-gray-600 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors"
                       data-target="<?php echo e($item['id']); ?>">
                        <?php echo e($item['text']); ?>

                    </a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>

        <?php if(isset($repository)): ?>
            <div class="mt-8 pt-8 border-t border-gray-200 dark:border-slate-700">
                <h2 class="text-sm font-semibold text-gray-900 dark:text-white mb-4">
                    Backlinks
                </h2>
                <ul class="space-y-2.5 text-sm">
                    <?php if($repository->demo): ?>
                        <li>
                            <a href="<?php echo e($repository->demo); ?>" target="_blank"
                               class="block text-indigo-600 dark:text-indigo-400 hover:underline">
                                Demo
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if($repository->support): ?>
                        <li>
                            <a href="<?php echo e($repository->support); ?>" target="_blank"
                               class="block text-indigo-600 dark:text-indigo-400 hover:underline">
                                Support
                            </a>
                        </li>
                    <?php endif; ?>
                    <li>
                        <a href="<?php echo e(route('docs.index')); ?>"
                           class="block text-indigo-600 dark:text-indigo-400 hover:underline">
                            All Documentation
                        </a>
                    </li>
                </ul>
            </div>
        <?php endif; ?>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tocLinks = document.querySelectorAll('.toc-link');

            // Smooth scroll
            tocLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('data-target');
                    const target = document.getElementById(targetId);
                    if (target) {
                        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                        history.pushState(null, null, '#' + targetId);
                    }
                });
            });

            // Intersection observer for active state
            const observerOptions = {
                rootMargin: '-100px 0px -66%',
                threshold: 0
            };

            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        tocLinks.forEach(link => {
                            link.classList.remove('text-indigo-600', 'dark:text-indigo-400', 'font-medium');
                            link.classList.add('text-gray-600', 'dark:text-gray-400');
                        });

                        const activeLink = document.querySelector(`.toc-link[data-target="${entry.target.id}"]`);
                        if (activeLink) {
                            activeLink.classList.remove('text-gray-600', 'dark:text-gray-400');
                            activeLink.classList.add('text-indigo-600', 'dark:text-indigo-400', 'font-medium');
                        }
                    }
                });
            }, observerOptions);

            // Observe all headings
            tocLinks.forEach(link => {
                const targetId = link.getAttribute('data-target');
                const target = document.getElementById(targetId);
                if (target) {
                    observer.observe(target);
                }
            });
        });
    </script>
<?php endif; ?>
<?php /**PATH /Users/kunle/Herd/maylancer/resources/views/frontpage/docs/partials/on-page.blade.php ENDPATH**/ ?>