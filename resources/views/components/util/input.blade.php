@props(['type', 'label', 'placeholder', 'name', 'prevData'])
<div x-data="{ hasError: true }" class="my-4">
    <label for="{{ $name ?? 'name' }}" class="w-full font-semibold">{{ $label ?? '' }}</label>
    <input type="{{ $type ?? 'text' }}"
        {{ $attributes->merge([
            'class' => 'w-full my-2 px-4 py-2 rounded-full outline-none border-white
                        focus:border-primary border-2 focus:bg-secondary  transition duration-500',
        ]) }}
        name="{{ $name ?? '' }}" id="{{ $name ?? '' }}" placeholder="{{ $placeholder ?? '' }}"
        value="{{ isset($prevData) ? $prevData : old($name ?? '') }}" x-on:input.change="hasError = false" />
    @error($name)
        <p class="text-red-500" x-show="hasError">{{ $message }}</p>
    @enderror
</div>
