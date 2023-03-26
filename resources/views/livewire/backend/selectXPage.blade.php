<div class="py-1">
    <select wire:model="collectionView" class="rounded text-xs h-8 text-gray-800 dark:text-gray-500 sm:px-2">
        @foreach ($collectionViews as $collectionView)
        <option value="{{ $collectionView }}">{{ $collectionView }}</option>
        @endforeach
    </select>
</div>