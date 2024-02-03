@props(['text', 'fullwidth', 'disabled'])
<button type="submit"
    {{ $attributes->merge([
        'class' =>
            (isset($fullwidth) ? 'w-full' : 'w-fit') .
            (isset($disabled) ? 'pointer-events-none' : '') .
            " font-bold text-2xl text-center my-4 uppercase px-4 py-2 border-2
                border-primary bg-white text-primary rounded-full hover:bg-primary hover:text-white
                transition duration-300",
    ]) }}>
    {{ $text }}
</button>
