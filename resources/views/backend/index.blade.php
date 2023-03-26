<x-layouts.layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-gray-200 overflow-hidden shadow-xl sm:rounded-lg">
                @livewire('backend.live-table')

            </div>
        </div>
    </div>
</x-layouts.layout>