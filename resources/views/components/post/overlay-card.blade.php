@props(['post'])
<article class="basis-1/3 p-4">
    <a href="/posts/{{ $post->id }}">
        <div {{ $attributes->merge(['class' => 'relative h-[350px] overflow-hidden group bg-contain bg-no-repeat bg-center']) }}
            style="background-image:url('/img/loading.gif')">
            <img src="{{ $post->imgUrl }}"
                class="absolute top-0 bottom-0 left-0 right-0 object-cover w-full h-full shadow rounded-lg group-hover:scale-[110%] transition duration-300" />
            <div
                class="absolute top-0 bottom-0 left-0 right-0 bg-gradient-to-b from-transparent to-black opacity-80 text-white flex flex-col justify-end items-center gap-1 pb-6 rounded-lg group-hover:pb-12 tranistion duration-300">
                <a href="/categories/{{ $post->category->name }}">
                    <p class="text-white text-sm">{{ $post->category->name }}</p>
                </a>
                <p class="uppercase font-semibold">{{ $post->title }}</p>
                <p class="lowsercase font-extralight text-xs flex-center gap-2">
                    {{ $post->author->name }}
                    <x-fas-dot-circle class="w-2 h-2 text-primary" />
                    {{ \Carbon\Carbon::parse($post->published_at)->diffForHumans() }}
                </p>
            </div>
        </div>
    </a>
</article>
