<p class="text-primary text-xl font-semibold px-2">
    {{ $category1->name }}
</p>
@foreach ($posts as $post)
    <x-post.avatar-card :post="$post" />
@endforeach
