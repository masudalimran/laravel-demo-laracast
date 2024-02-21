@props(['post'])
<article class="basis-1/3 p-4 flex gap-4 group">
    <a href="/posts/{{ $post->id }}">
        @php
            $imageSerial = $post->id + 1;
            $imgUrl = handlePostImgPath($post->imgUrl);
        @endphp
        <x-util.lazy-img :imgUrl="$imgUrl" class="w-[300px] h-[200px]" />
    </a>
    <div class="basis-1/2 flex flex-col justify-start items-start gap-2">
        <a href="/categories/{{ $post->category->name }}">
            <p class="text-primary">{{ $post->category->name }}</p>
        </a>
        <p class="uppercase text-xl font-semibold">{{ $post->title }}</p>
        <p class="font-cang font-thin">{{ $post->excerpt }}</p>
        <p class="font-extralight">{{ substr($post->body, 0, 80) }}...</p>
        <p class="lowsercase font-extralight text-xs flex-center gap-2">
            {{ $post->author->name }}
            <x-fas-dot-circle class="w-2 h-2 text-primary" />
            {{ \Carbon\Carbon::parse($post->published_at)->diffForHumans() }}
        </p>
    </div>
</article>
