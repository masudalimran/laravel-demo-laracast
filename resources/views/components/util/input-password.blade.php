@props(['label', 'placeholder', 'name'])
<div x-data="{ type: 'password', hasError: true }">
    <label for="name" class="w-full font-semibold">{{ $label ?? 'Password' }}</label>
    <div class="relative">
        <input :type="type" required
            :class="{ '!border-orange-500 focus:!border-orange-500': type === 'text' }"
            name="{{ $name ?? 'password' }}"
            class="w-full my-2 px-4 py-2 rounded-full outline-none border-white focus:border-primary border-2"
            placeholder="{{ $placeholder ?? '******' }}" value="{{ old($name ?? '') }}"
            x-on:input.change="hasError = false" />
        <p class="absolute right-12 bottom-0 h-full flex items-center" x-show="type === 'text'"
            @click="type = 'password'">
            <x-feathericon-eye-off class="text-gray-500 hover:text-black cursor-pointer transition " />
        </p>
        <p class="absolute right-12 bottom-0 h-full flex items-center" x-show="type === 'password'"
            @click="type = 'text'">
            <x-feathericon-eye class="text-gray-500 hover:text-black cursor-pointer transition " />
        </p>
    </div>
    @error($name)
        <p class="text-red-500" x-show="hasError">{{ $message }}</p>
    @enderror
</div>
