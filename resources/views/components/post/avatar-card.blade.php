@php
    use Carbon\Carbon;
@endphp
@props(['post', 'isBackend'])
<article
    class="basis-1/3 py-4 flex gap-2 justify-start items-start border-b-2 border-transparent hover:border-black p-2 transition duration-300">
    <a href="/posts/{{ $post->id }}">
        @php
            $imageSerial = $post->id + 1;
            $imgUrl = handlePostImgPath($post->imgUrl);
        @endphp
        <x-util.lazy-img :imgUrl="$imgUrl" class="h-[50px] w-[50px] rounded-full" />
    </a>
    <div class="flex flex-col justify-start items-start gap-1">
        <p class="uppercase font-semibold text-sm">{{ $post->title }}</p>
        @if (isset($isBackend))
            <p class="lowsercase font-thin text-sm flex-center gap-2">
                Created: {{ Carbon::parse($post->created_at)->toDateTimeString() }}
            </p>
            <p class="lowsercase font-thin text-sm flex-center gap-2">
                Author: {{ $post->author->name }}
            </p>
        @else
            <p class="lowsercase font-thin text-sm flex-center gap-2">
                {{ $post->author->name }}
                <x-fas-dot-circle class="w-2 h-2 text-primary" />
                {{ Carbon::parse($post->published_at)->diffForHumans() }}
            </p>
        @endif
    </div>
</article>
