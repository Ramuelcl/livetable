<!-- // resources.views.components.forms.table.blade.php // -->
<!-- // app.view.components.forms.table.php // -->
<div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-gray-50 dark:bg-gray-800 text-gray-800 dark:text-gray-50 border-2">
    <table class="{{ $borderCell }} table w-full text-sm">
        @if (isset($caption))
        <caption>
            {{ $caption }}
        </caption>
        @else
        <caption>
            Título de la tabla
        </caption>
        @endif
        @if (isset($titles))
        <thead class="bg-gray-50 dark:bg-gray-800 text-gray-800 dark:text-gray-50">
            <tr class="{{ $tTitles }} {{ $tAlign }}">
                {{ $titles }}
            </tr>
        </thead>
        @else
        <thead>
            <tr class="{{ $tTitles }} {{ $tAlign }}">
                <td>Títulos de columnas</td>
            </tr>
        </thead>
        @endif
        <tbody>
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
            <tr class="font-semibold divide-y divide-gray-200">
                <th scope="row" class="px-2 py-1 text-base">Total</th>
                {{ $foot }}
            </tr>
        </tfoot>
        @endisset
    </table>
</div>
