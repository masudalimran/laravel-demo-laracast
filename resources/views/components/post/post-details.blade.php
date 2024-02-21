@props(['post', 'latest', 'featured', 'related'])

@php
    $comments = $post->comments;
    $mainPost = $post;
@endphp
<div class="body-padding px-4 pt-2 underline text-primary">
    @if (url()->full() === url()->previous())
        <a href="/">Go Home</a>
    @else
        <a href="{{ url()->previous() }}">Back</a>
    @endif
</div>
<div class="body-padding flex justify-between gap-4">
    <section class="basis-2/3">
        <x-post.overlay-card :post="$post" class="h-[550px]" />
        <div class="p-4 bg-secondary rounded-xl">
            <p class="uppercase font-bold text-2xl font-rubik">{{ $post->title }}</p>
            <p class="font-cang text-2xl">{{ $post->excerpt }}</p>
            <a href="/categories/{{ $post->category->name }}">
                <p class="my-2 px-4 bg-primary text-white rounded-full py-2 w-fit">{{ $post->category->name }}</p>
            </a>
            <p class="font-light">{{ str_repeat($post->body, 3) }}</p>
            <p class="font-bold my-4">{{ $post->excerpt }}</p>
            <p class="font-light">{{ str_repeat($post->body, 3) }}</p>
            <div class="flex gap-4 my-6">
                @foreach ($featured as $post)
                    @php
                        $imageSerial = $post->id + 1;
                        $imgUrl = handlePostImgPath($post->imgUrl);
                    @endphp
                    <x-util.lazy-img :imgUrl="$imgUrl" class="h-[300px] w-full" />
                @endforeach
            </div>
            <div class="flex justify-center items-center opacity-60">
                <caption>{{ $post->excerpt }}</caption>
            </div>
            <p class="font-bold my-4">{{ $post->excerpt }}</p>
            <p class="font-light">{{ str_repeat($post->body, 3) }}</p>

            <section class="my-6 p-2 bg-white rounded-xl">
                <p class="text-2xl mx-4 font-semibold">Related</p>
                <div class="flex">
                    @foreach ($related as $post)
                        <x-post.small-card :post="$post" />
                    @endforeach
                </div>
            </section>

            <div>
                @error('comment')
                    <x-util.scroll-point />
                @enderror
                <p class="text-xl my-4 font-serif">
                    <span class="text-primary font-semibold">
                        {{ $comments->count() }}
                        Comments Already!
                    </span>
                    @auth Add Yours... @endauth
                </p>

                @auth
                    <form method="post" action="/post/{{ $mainPost->id }}/comment" id="comment-form"
                        x-data="">
                        @csrf
                        <textarea class="w-full rounded-2xl p-4 resize-none outline-none border-white focus:border-primary border-2"
                            rows="4" placeholder="Type your comment here..." name="comment" id='comment' required
                            @keyup.ctrl.enter="submitCommentForm()">{{ old('comment') }}</textarea>
                        @error('comment')
                            <p class="text-red-500">{{ $message ?? 'somethimg went wrong' }}</p>
                        @enderror
                        <div class="flex justify-end">
                            <x-util.submit-button text="Comment" />
                        </div>
                    </form>
                @endauth

                @foreach ($comments as $comment)
                    <x-post.comment-card :comment="$comment" :isLast="$loop->last" />
                @endforeach

                @if (session()->has('created'))
                    <x-util.scroll-point-smooth />
                @endif
            </div>
        </div>
    </section>
    <section class="basis-1/3 self-start sticky top-0">
        <div class="m-2 p-6 bg-secondary rounded-xl">
            <a href="/categories/{{ $post->category->name }}">
                <p class="text-primary text-xl font-semibold px-2">
                    {{ $latest->first()->category->name }}
                </p>
            </a>
            @foreach ($latest as $post)
                <x-post.avatar-card :post="$post" />
            @endforeach
        </div>
        <x-util.newsletter />
    </section>
</div>

{{-- Custom Scripts --}}
<script>
    function submitCommentForm() {
        document.getElementById('comment-form').submit();
    }
</script>
