@props(['name' => '', 'label' => '', 'type' => 'text', 'required' => false])
<x-form.field>
    <x-form.label :name="$name" :label="$label" />

    @if ($type === 'textarea')
        <textarea name="{{ $name }}" id="{{ $name }}" class="border border-gray-400 p-2 w-full"
            {{ $required ? 'required' : '' }}>{{ old($name) }}</textarea>
    @else
        <input type="{{ $type }}" class="border border-gray-400 p-2 w-full" :value="old({{ $name }})"
            name="{{ $name }}" id="{{ $name }}" {{ $required ? 'required' : '' }}>
    @endif

    <x-form.error :name="$name" />
</x-form.field>
