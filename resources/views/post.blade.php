<x-layout>
    <x-slot:pageTitle>Post | {{ $post->title }}</x-slot:pageTitle>
    <x-slot:mainContent>
        <x-post.post-details :post="$post" :latest="$posts->slice(20, 4)" :featured="$posts->filter(fn($value, $key) => $value->category_id === $post->category_id)->slice(3, 3)" :related="$posts->filter(fn($value, $key) => $value->category_id === $post->category_id)->slice(1, 3)" />
    </x-slot:mainContent>
</x-layout>
