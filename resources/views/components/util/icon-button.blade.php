@props(['text', 'isActive', 'link', 'fullWidth', 'noRound'])
<a href="{{ $link ?? '' }}" class="{{ isset($link) ? '' : 'pointer-events-none' }} ">
    <button
        class="font-bold text-2xl text-center my-4 uppercase p-4 border-2 border-primary
            {{ isset($isActive) ? 'bg-primary text-white' : 'bg-white text-primary' }}
            {{ isset($fullWidth) ? 'w-full' : '' }}
            {{ isset($noRound) ? 'rounded-none' : 'rounded-full' }}
            hover:bg-primary hover:text-white transition duration-300 flex justify-center gap-1 items-center group ">
        {{ $slot }}
        <span class="w-[0px] overflow-hidden group-hover:w-[100px] text-xl transition-all duration-300">
            {{ $text ?? '' }}
        </span>
    </button>
</a>
