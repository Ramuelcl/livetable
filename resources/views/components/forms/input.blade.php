@props(['disabled' => false, 'type'=>"text"])

<div class="mr-1 mb-3">
    <div>
        @if ($label)
        <label for="{{$idName}}" class="block text-sm font-medium text-gray-700">{{$label}}</label>
        @endif
        <div class="mt-1 relative rounded-md shadow-sm">
            <input wire:model="{{$idName}}" type="{{$type}}" name="{{$idName}}" id="{{$idName}}" placeholder="{{$placeholder}}" {{ $disabled ? 'disabled' : '' }} {{ $attributes->merge(['class' =>'focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-1 sm:text-sm border-gray-300 rounded-md',]) }}>
        </div>
        <x-jet-input-error for="{{$idName}}"></x-jet-input-error>
    </div>
</div>
