<style>
/* Anchor links for headings */
article .anchor-link {
    color: #6b7280;
    text-decoration: none;
    margin-left: -1.25rem;
    padding-right: 0.25rem;
    font-weight: 400;
    opacity: 0;
    transition: opacity 0.2s;
}

article h2:hover .anchor-link,
article h3:hover .anchor-link,
article h4:hover .anchor-link,
article h5:hover .anchor-link,
article h6:hover .anchor-link {
    opacity: 1;
}

article .anchor-link:hover {
    color: #4f46e5;
}

.dark article .anchor-link {
    color: #9ca3af;
}

.dark article .anchor-link:hover {
    color: #818cf8;
}



article pre code {
    display: block;
    padding: 1rem;
    font-size: 0.875rem;
    line-height: 1.7;
    font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
    color: #e5e7eb;
    background: transparent;
}

/* Inline code */
article :not(pre) > code {
    background-color: #fdf2f8;
    color: #db2777;
    padding: 0.125rem 0.375rem;
    border-radius: 0.25rem;
    font-size: 0.875rem;
    font-weight: 600;
    font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace;
}

.dark article :not(pre) > code {
    background-color: rgba(219, 39, 119, 0.1);
    color: #f9a8d4;
}

/* Syntax highlighting */
article pre code .token.comment { color: #6b7280; }
article pre code .token.string { color: #34d399; }
article pre code .token.number { color: #f87171; }
article pre code .token.keyword { color: #a78bfa; }
article pre code .token.function { color: #fbbf24; }
article pre code .token.operator { color: #60a5fa; }
article pre code .token.variable { color: #f472b6; }
</style>

<article class="prose prose-slate dark:prose-invert max-w-none
    prose-headings:font-semibold prose-headings:tracking-tight
    prose-h1:text-5xl prose-h1:font-bold prose-h1:text-gray-900 dark:prose-h1:text-white prose-h1:mb-6 prose-h1:mt-0
    prose-h2:text-3xl prose-h2:text-gray-900 dark:prose-h2:text-white prose-h2:mt-12 prose-h2:mb-4 prose-h2:pb-2 prose-h2:border-b prose-h2:border-gray-200 dark:prose-h2:border-slate-800
    prose-h3:text-xl prose-h3:text-gray-900 dark:prose-h3:text-white prose-h3:mt-8 prose-h3:mb-3
    prose-p:text-gray-600 dark:prose-p:text-gray-400 prose-p:leading-7 prose-p:mb-4
    prose-a:text-indigo-600 dark:prose-a:text-indigo-400 prose-a:no-underline hover:prose-a:underline prose-a:font-normal
    prose-ul:list-disc prose-ul:pl-6 prose-ul:my-4
    prose-ol:list-decimal prose-ol:pl-6 prose-ol:my-4
    prose-li:text-gray-600 dark:prose-li:text-gray-400 prose-li:my-2
    prose-strong:text-gray-900 dark:prose-strong:text-white prose-strong:font-semibold
    prose-img:rounded-lg prose-img:my-8 prose-img:border prose-img:border-gray-200 dark:prose-img:border-slate-700
    prose-table:w-full prose-table:my-6 prose-table:border-collapse
    prose-th:bg-gray-50 dark:prose-th:bg-slate-800 prose-th:px-4 prose-th:py-2 prose-th:text-left prose-th:font-semibold prose-th:text-gray-900 dark:prose-th:text-white prose-th:border prose-th:border-gray-200 dark:prose-th:border-slate-700
    prose-td:px-4 prose-td:py-2 prose-td:border prose-td:border-gray-200 dark:prose-td:border-slate-700 prose-td:text-gray-600 dark:prose-td:text-gray-400
    prose-blockquote:border-l-4 prose-blockquote:border-amber-400 prose-blockquote:bg-amber-50 dark:prose-blockquote:bg-amber-900/10 prose-blockquote:py-3 prose-blockquote:px-4 prose-blockquote:rounded-r-lg prose-blockquote:my-6
    prose-blockquote:not-italic prose-blockquote:text-gray-700 dark:prose-blockquote:text-gray-300">

    <?php echo $content; ?>


</article>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add copy buttons to all code blocks
    document.querySelectorAll('article pre').forEach(function(pre) {
        // Skip if already wrapped
        if (pre.parentElement.classList.contains('code-block-wrapper')) return;

        // Create wrapper
        const wrapper = document.createElement('div');
        wrapper.className = 'code-block-wrapper relative group my-6';
        pre.parentNode.insertBefore(wrapper, pre);
        wrapper.appendChild(pre);

        // Create copy button
        const button = document.createElement('button');
        button.className = 'absolute top-3 right-3 px-3 py-1.5 text-xs font-medium text-gray-400 hover:text-white bg-gray-800 hover:bg-gray-700 border border-gray-700 rounded-md transition-all opacity-0 group-hover:opacity-100';
        button.innerHTML = '<span class="copy-text">Copy</span>';

        button.addEventListener('click', function() {
            const code = pre.querySelector('code');
            const text = code ? code.innerText : pre.innerText;

            navigator.clipboard.writeText(text).then(function() {
                const span = button.querySelector('.copy-text');
                span.textContent = 'Copied!';
                button.classList.add('text-green-400');

                setTimeout(function() {
                    span.textContent = 'Copy';
                    button.classList.remove('text-green-400');
                }, 2000);
            });
        });

        wrapper.appendChild(button);
    });
});
</script>

<?php if(isset($prevPage) || isset($nextPage)): ?>
    <div class="mt-12 pt-6 border-t border-gray-200 dark:border-slate-700 flex justify-between items-center">
        <?php if(isset($prevPage)): ?>
            <a href="<?php echo e(route('docs.show', [$doc, $currentVersion, $prevPage->slug])); ?>"
               class="inline-flex items-center text-sm text-indigo-600 dark:text-indigo-400 hover:underline font-medium">
                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                <?php echo e($prevPage->title ?? ucfirst(basename($prevPage->slug))); ?>

            </a>
        <?php else: ?>
            <div></div>
        <?php endif; ?>

        <?php if(isset($nextPage)): ?>
            <a href="<?php echo e(route('docs.show', [$doc, $currentVersion, $nextPage->slug])); ?>"
               class="inline-flex items-center text-sm text-indigo-600 dark:text-indigo-400 hover:underline font-medium">
                <?php echo e($nextPage->title ?? ucfirst(basename($nextPage->slug))); ?>

                <svg class="w-4 h-4 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        <?php endif; ?>
    </div>
<?php endif; ?>
<?php /**PATH /Users/kunle/Herd/maylancer/resources/views/frontpage/docs/partials/content.blade.php ENDPATH**/ ?>