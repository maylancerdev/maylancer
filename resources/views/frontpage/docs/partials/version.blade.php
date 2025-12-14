<div class="mb-6 pb-6 border-b border-gray-200 dark:border-slate-700">
    <select
        id="version-select"
        name="alias"
        onchange="location='{{ url('docs/'.$currentDoc['id']) }}/' + this.options[this.selectedIndex].value"
        class="w-full px-3 py-2 text-sm bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-lg text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
    >
        @if (isset($currentVersion))
            @if (count($versions) > 1)
                @foreach ($versions as $version)
                    <option value="{{ $version }}" @if($currentVersion == $version) selected="selected" @endif>
                        {{ $version }}
                    </option>
                @endforeach
            @else
                <option value="{{ $currentVersion }}" selected="selected">
                    {{ $currentVersion }}
                </option>
            @endif
        @endif
    </select>
</div>
