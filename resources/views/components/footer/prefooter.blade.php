@foreach ($posts as $post)
    @php
        $imageSerial = $post->id + 1;
        $imgUrl = str_contains($post->imgUrl, 'blog-img') ? asset('storage/' . $post->imgUrl) : $post->imgUrl;
    @endphp
    <x-util.lazy-img :imgUrl="$imgUrl" class="h-[200px] w-full" />
@endforeach
