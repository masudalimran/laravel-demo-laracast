@props(['post'])
<article class="basis-1/2 p-4">
    <a href="/posts/{{ $post->id }}">
        @php
            $imageSerial = $post->id + 1;
            $imgUrl = "/img/blogs/blog-$imageSerial.jpg";
        @endphp
        <x-util.lazy-img :imgUrl="$imgUrl" class="h-[300px] w-full" />
    </a>
    <div class="flex flex-col justify-center items-center gap-1 mt-2">
        <a href="/categories/{{ $post->category->name }}">
            <p class="text-center text-primary text-sm">{{ $post->category->name }}</p>
        </a>
        <p class="uppercase text-center font-semibold">{{ $post->title }}</p>
        <p class="lowsercase font-extralight text-xs flex-center gap-2">
            {{ $post->author->name }}
            <x-fas-dot-circle class="w-2 h-2 text-primary" />
            {{ \Carbon\Carbon::parse($post->published_at)->diffForHumans() }}
        </p>
    </div>
</article>
