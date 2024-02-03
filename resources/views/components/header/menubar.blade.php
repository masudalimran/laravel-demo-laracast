@php
    $preData = request('search') ?? '';
@endphp
<nav class="bg-white pb-6">
    <ul class="flex-center gap-6">
        <a href="/">
            <li class="hover:underline cursor-pointer {{ isset($currentCategory) ? '' : 'underline' }}">All</li>
        </a>
        @foreach ($categories as $category)
            <a href="/categories/{{ $category->name }}{{ $preData !== '' ? '?search=' . $preData : '' }}">
                <li
                    class="hover:underline cursor-pointer {{ isset($currentCategory) && $currentCategory->is($category) ? 'underline' : '' }}">
                    {{ $category->name }} ({{ $category->posts->count() }})
                </li>
            </a>
        @endforeach
        <x-util.search :preData="$preData" />
    </ul>
</nav>
