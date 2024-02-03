@foreach ($categories as $category)
    <div class="m-2 p-6 even:bg-secondary odd:bg-white rounded-xl">
        <a href="/categories/{{ $category->name }}">
            <p class="text-primary text-xl font-semibold px-2">
                {{ $category->name }}
            </p>
        </a>
        @foreach ($category->posts->slice(0, 2) as $post)
            <x-post.avatar-card :post="$post" />
        @endforeach
    </div>
@endforeach
