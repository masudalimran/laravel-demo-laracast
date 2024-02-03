@props(['imgUrl'])
<div {{ $attributes->merge(['class' => 'relative overflow-hidden rounded-2xl bg-contain bg-no-repeat bg-center']) }}
    style="background-image:url('/img/loading.gif')">
    <img src="{{ $imgUrl }}"
        class="absolute top-0 bottom-0 left-0 right-0 object-cover w-full h-full shadow rounded hover:scale-[120%] transition duration-300" />
</div>
