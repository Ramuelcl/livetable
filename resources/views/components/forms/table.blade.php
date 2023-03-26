<!-- // resources.views.components.forms.table.blade.php // -->
<!-- // app.view.components.forms.table.php // -->
<div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-rose-100 dark:bg-blue-800 border-2">
    <table class="{{ $borderCell }} table w-full text-sm">
        @if (isset($caption))
        <caption class="text-gray-800 dark:text-gray-100">
            {{ $caption }}
        </caption>
        @else
        <caption class="text-gray-800 dark:text-gray-100">
            Título de la tabla
        </caption>
        @endif
        @if (isset($titles))
        <thead class="text-xs bg-rose-100 dark:bg-blue-800">
            <tr class="{{ $tTitles }} {{ $tAlign }}">
                {{ $titles }}
            </tr>
        </thead>
        @else
        <thead class="text-xs text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr class="{{ $tTitles }} {{ $tAlign }}">
                <td>Títulos de columnas</td>
            </tr>
        </thead>
        @endif
        <tbody class="bg-gray-100 divide-y divide-gray-200 dark:bg-gray-700">
            @if (isset($slot))
            {{ $slot }}
            @else
            <tr>
                <td>faltan los datos</td>
            </tr>
            @endif
        </tbody>
        @isset($foot)
        <tfoot>
            <tr class="font-semibold bg-gray-300  dark:bg-gray-600 text-gray-100 dark:text-gray-500 divide-y divide-gray-200">
                <th scope="row" class="px-2 py-1 text-base">Total</th>
                {{ $foot }}
            </tr>
        </tfoot>
        @endisset
    </table>
</div>
