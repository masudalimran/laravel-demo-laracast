@props(['text', 'isActive', 'link', 'fullWidth', 'noRound', 'alternate'])
<a href="{{ $link ?? '' }}" class="{{ isset($link) ? '' : 'pointer-events-none' }} ">
    <button
        class="font-bold text-2xl text-center my-4 uppercase px-4 py-2 border-2 border-primary
            {{ isset($isActive)
                ? (isset($alternate)
                    ? 'bg-red-400 text-white border-red-400 hover:bg-red-400 hover:text-white'
                    : 'bg-primary text-white hover:bg-primary hover:text-white')
                : (isset($alternate)
                    ? 'bg-white text-red-400 border-red-400 hover:bg-red-400 hover:text-white'
                    : 'bg-white text-primary hover:bg-primary hover:text-white') }}
            {{ isset($fullWidth) ? 'w-full' : '' }}
            {{ isset($noRound) ? 'rounded-none' : 'rounded-full' }}
             transition duration-300 flex justify-center items-center gap-2">
        {{ $slot }}
        {{ $text ?? '' }}
    </button>
</a>
