<div class="mb-6">
    <div class="relative">
        <input
            type="text"
            id="docsSearch"
            placeholder="Search..."
            class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-slate-700 rounded-md bg-white dark:bg-slate-800 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:focus:ring-slate-600 focus:border-transparent"
            autocomplete="off"
        >
        <div id="searchResults" class="hidden absolute mt-2 w-full rounded-md bg-white dark:bg-slate-800 shadow-lg border border-gray-200 dark:border-slate-700 max-h-96 overflow-y-auto z-50">
            <div id="searchResultsContent"></div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('docsSearch');
    const searchResults = document.getElementById('searchResults');
    const searchResultsContent = document.getElementById('searchResultsContent');
    const docNav = document.getElementById('docNav');

    if (!searchInput || !docNav) return;

    const searchIndex = [];
    docNav.querySelectorAll('a').forEach(link => {
        const text = link.textContent.trim();
        const href = link.getAttribute('href');
        if (text && href) {
            searchIndex.push({ text, href });
        }
    });

    searchInput.addEventListener('input', function(e) {
        const query = e.target.value.toLowerCase().trim();

        if (query.length < 2) {
            searchResults.classList.add('hidden');
            return;
        }

        const results = searchIndex.filter(item =>
            item.text.toLowerCase().includes(query)
        );

        if (results.length === 0) {
            searchResultsContent.innerHTML = '<div class="px-4 py-3 text-sm text-gray-500 dark:text-gray-400">No results found</div>';
            searchResults.classList.remove('hidden');
            return;
        }

        searchResultsContent.innerHTML = results.slice(0, 10).map(result => `
            <a href="${result.href}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-slate-700">
                ${result.text}
            </a>
        `).join('');

        searchResults.classList.remove('hidden');
    });

    document.addEventListener('click', function(e) {
        if (!searchInput.contains(e.target) && !searchResults.contains(e.target)) {
            searchResults.classList.add('hidden');
        }
    });

    searchInput.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            searchResults.classList.add('hidden');
            searchInput.blur();
        }
    });
});
</script>
