<div
    x-data="{
        query: '',
        selectedHit: 0,
        searchIndex: [],
        init() {
            // Build search index from navigation
            const docNav = document.getElementById('docNav');
            if (docNav) {
                docNav.querySelectorAll('a').forEach(link => {
                    const text = link.textContent.trim();
                    const href = link.getAttribute('href');
                    if (text && href) {
                        this.searchIndex.push({ text, href });
                    }
                });
            }
        },
        get filteredResults() {
            if (this.query.length < 2) return [];
            const lowerQuery = this.query.toLowerCase();
            return this.searchIndex
                .filter(item => item.text.toLowerCase().includes(lowerQuery))
                .slice(0, 10);
        },
        highlightMatch(text) {
            if (!this.query) return text;
            const regex = new RegExp(`(${this.query})`, 'gi');
            return text.replace(regex, '<strong class=&quot;text-indigo-600 dark:text-indigo-400 font-semibold&quot;>$1</strong>');
        }
    }"
    x-init="$watch('query', () => selectedHit = 0)"
    @keyup.down.prevent="
        if (filteredResults.length === 0) return;
        selectedHit = selectedHit === filteredResults.length - 1 ? 0 : selectedHit + 1;
        document.getElementById('hit-' + selectedHit)?.scrollIntoView({behavior: 'smooth', block: 'nearest'});
    "
    @keyup.up.prevent="
        if (filteredResults.length === 0) return;
        selectedHit = selectedHit === 0 ? filteredResults.length - 1 : selectedHit - 1;
        document.getElementById('hit-' + selectedHit)?.scrollIntoView({behavior: 'smooth', block: 'nearest'});
    "
    @keyup.enter.prevent="
        if (filteredResults[selectedHit]) {
            window.location.href = filteredResults[selectedHit].href;
        }
    "
    class="relative"
>
    <!-- Search Input Header -->
    <div class="relative border-b border-gray-200 dark:border-slate-700 px-6 py-4 flex justify-between items-center gap-4">
        <div class="flex-1 flex items-center gap-3">
            <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m-4 2a6 6 0 1 1 0-12 6 6 0 0 1 0 12Z"/>
            </svg>
            <input
                x-model="query"
                x-ref="search"
                type="search"
                placeholder="Search documentation..."
                class="flex-1 bg-transparent border-none outline-none text-gray-900 dark:text-gray-100 placeholder-gray-400 text-base focus:ring-0"
                @keyup.esc.window="$store.modals.close('search-modal')"
                autofocus
            >
        </div>
        <button
            x-on:click.prevent="$store.modals.close('search-modal')"
            class="text-xs px-2.5 py-1 flex items-center justify-center h-6 font-semibold text-gray-500 dark:text-gray-400 bg-gray-100 dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded"
        >
            ESC
        </button>
    </div>

    <!-- Search Results -->
    <div class="px-6 py-6 overflow-auto" style="max-height: 50vh;">
        <template x-if="query === ''">
            <p class="text-sm text-gray-500 dark:text-gray-400">
                Start typing to search the documentation...
            </p>
        </template>

        <template x-if="query !== '' && filteredResults.length === 0">
            <p class="text-sm text-gray-500 dark:text-gray-400">
                No results found for "<span x-text="query"></span>"
            </p>
        </template>

        <template x-if="query !== '' && filteredResults.length > 0">
            <ul class="flex flex-col gap-2">
                <template x-for="(result, index) in filteredResults" :key="index">
                    <li>
                        <a
                            :id="'hit-' + index"
                            :href="result.href"
                            :class="selectedHit === index ? 'bg-indigo-50 dark:bg-indigo-900/20 text-indigo-600 dark:text-indigo-400' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-slate-800'"
                            class="block px-4 py-3 rounded-lg outline-none transition-colors"
                            @mouseenter="selectedHit = index"
                        >
                            <p class="text-sm font-medium" x-html="highlightMatch(result.text)"></p>
                        </a>
                    </li>
                </template>
            </ul>
        </template>
    </div>
</div>
