@props(['label', 'placeholder', 'name'])
<div x-data="{ type: 'password' }">
    <label for="name" class="w-full font-semibold">{{ $label ?? '' }}</label>
    <div class="relative">
        <input :type="type"
            {{ $attributes->merge(['class' => 'w-full my-2 px-4 py-2 rounded-full outline-none border-white focus:border-primary border-2']) }}
            name="{{ $name ?? '' }}" placeholder="{{ $placeholder ?? '' }}" value="{{ old($name ?? '') }}" />
        @if ($name === 'password')
            <p class="absolute right-12 bottom-0 h-full flex items-center" x-show="type === 'text'"
                @click="type = 'password'">
                <x-feathericon-eye-off class="text-gray-500 hover:text-black cursor-pointer transition " />
            </p>
            <p class="absolute right-12 bottom-0 h-full flex items-center" x-show="type === 'password'"
                @click="type = 'text'">
                <x-feathericon-eye class="text-gray-500 hover:text-black cursor-pointer transition " />
            </p>
        @endif
    </div>
</div>
