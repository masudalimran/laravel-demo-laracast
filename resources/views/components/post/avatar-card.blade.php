@props(['post'])
<article
    class="basis-1/3 py-4 flex gap-2 justify-start items-start hover:shadow-lg rounded-lg p-2 transition duration-300">
    <a href="/posts/{{ $post->id }}">
        @php
            $imageSerial = $post->id + 1;
            $imgUrl = "/img/blogs/blog-$imageSerial.jpg";
        @endphp
        <x-util.lazy-img :imgUrl="$imgUrl" class="h-[50px] w-[50px] rounded-full" />
    </a>
    <div class="flex flex-col justify-start items-start gap-1">
        <p class="uppercase font-semibold text-sm">{{ $post->title }}</p>
        <p class="lowsercase font-thin text-xs flex-center gap-2">
            {{ $post->author->name }}
            <x-fas-dot-circle class="w-2 h-2 text-primary" />
            {{ \Carbon\Carbon::parse($post->published_at)->diffForHumans() }}
        </p>
    </div>
</article>
