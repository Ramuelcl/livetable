<!-- // resources.views.components.forms.table.blade.php // -->
<!-- // app.view.components.forms.table.php // -->
<div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-gray-100 dark:bg-gray-800 border-2">
    @isset($bSearch)
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative mt-1 mx-1">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
            <input type="search" id="table-search"
                class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="{{ __('Search for items') }}">
        </div>
    @endisset
    <table class="{{ $borderCell }} w-full text-sm text-left text-gray-500 dark:text-gray-400">
        @isset($caption)
            <caption class="text-gray-800 dark:text-gray-100">
                {{ $caption }}
            </caption>
        @endisset
        @isset($titles)
            <thead class="text-xs text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr class="{{ $tTitles }} {{ $tAlign }}">
                    {{ $titles ?? null }}
                </tr>
            </thead>
        @endisset
        <tbody>

            {{ $slot ?? 'faltan los datos' }}

        </tbody>
        @isset($foot)
            <tfoot>
                <tr class="font-semibold text-gray-900 dark:text-white">
                    <th scope="row" class="px-2 py-3 text-base">Total</th>
                    {{ $foot ?? null }}
                </tr>
            </tfoot>
        @endisset
    </table>
    @isset($collection)
        <div class="text-xs text-gray-800 dark:text-gray-500 px-4 py-1 flex items-center justify-between sm:px-2">
            <select wire:model="collectionView" class="text-xs rounded-md">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
            </select>

            {{ $collection->links() }}
        </div>
    @endisset
</div>
