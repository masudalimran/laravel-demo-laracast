@props(['text', 'isActive', 'link', 'fullWidth', 'noRound'])
<a href="{{ $link ?? '' }}" class="{{ isset($link) ? '' : 'pointer-events-none' }} ">
    <button
        class="font-bold text-2xl text-center my-4 uppercase px-4 py-2 border-2 border-primary
            {{ isset($isActive) ? 'bg-primary text-white' : 'bg-white text-primary' }}
            {{ isset($fullWidth) ? 'w-full' : '' }}
            {{ isset($noRound) ? 'rounded-none' : 'rounded-full' }}
            hover:bg-primary hover:text-white transition duration-300 flex justify-center items-center gap-2">
        {{ $slot }}
        {{ $text ?? '' }}
    </button>
</a>
