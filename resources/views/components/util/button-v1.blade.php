@props(['text', 'isActive', 'link'])
<a href="{{ $link ?? '' }}" class="{{ isset($link) ? '' : 'pointer-events-none' }}">
    <button
        class="font-bold text-2xl text-center my-4 uppercase px-4 py-2 border-2 border-primary
            {{ isset($isActive) ? 'bg-primary text-white' : 'bg-white text-primary' }}
            rounded-full hover:bg-primary hover:text-white transition duration-300">
        {{ $text }}
    </button>
</a>
