@props(['type', 'label', 'placeholder', 'name'])
<div x-data="{ hasError: true }" class="my-4">
    <label for="{{ $name ?? 'name' }}" class="w-full font-semibold">{{ $label ?? '' }}</label>
    <input type="{{ $type ?? 'text' }}"
        {{ $attributes->merge(['class' => 'w-full my-2 px-4 py-2 rounded-full outline-none border-white focus:border-primary border-2']) }}
        name="{{ $name ?? '' }}" placeholder="{{ $placeholder ?? '' }}" value="{{ old($name ?? '') }}"
        x-on:input.change="hasError = false" />
    @error($name)
        <p class="text-red-500" x-show="hasError">{{ $message }}</p>
    @enderror
</div>
