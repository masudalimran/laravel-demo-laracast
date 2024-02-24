@props([
    'type' => 'text',
    'label' => '',
    'placeholder' => '',
    'name' => '',
    'prevData' => null,
    'autocomplete' => null,
])
<div x-data="{ hasError: true }" class="my-4">
    <label for="{{ $name }}" class="w-full font-semibold">
        {{ $label }}
    </label>
    <input type="{{ $type }}"
        {{ $attributes->merge([
            'class' => 'w-full my-2 px-4 py-2 rounded-full outline-none border-white
                                                            focus:border-primary border-2 focus:bg-secondary  transition duration-500',
        ]) }}
        name="{{ $name }}" id="{{ $name }}" placeholder="{{ $placeholder }}"
        value="{{ old($name) ?? $prevData }}" autocomplete={{ $autocomplete ?? $name }}
        aria-autocomplete={{ $autocomplete ?? $name }} x-on:input.change="hasError = false" />
    @error($name)
        <p class="text-red-500" x-show="hasError">{{ $message }}</p>
    @enderror
</div>
