@foreach ($posts as $post)
    @php
        $imageSerial = $post->id + 1;
        $imgUrl = $post->imgUrl;
    @endphp
    <x-util.lazy-img :imgUrl="$imgUrl" class="h-[200px] w-full" />
@endforeach
