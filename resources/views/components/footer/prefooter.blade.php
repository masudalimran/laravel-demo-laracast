@foreach ($posts as $post)
    @php
        $imageSerial = $post->id + 1;
        $imgUrl = "/img/blogs/blog-$imageSerial.jpg";
    @endphp
    <x-util.lazy-img :imgUrl="$imgUrl" class="h-[200px] w-full" />
@endforeach
