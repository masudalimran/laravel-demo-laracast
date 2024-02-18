@php
    $path = basename(request()->path());
    $menus = ['post' => 'Post', 'category' => 'Category', 'user' => 'User', 'subscriber' => 'Subscriber'];
@endphp

<ul class="flex items-center gap-6 text-xl font-thin">
    @foreach ($menus as $menuKey => $menuName)
        <a href="/admin/dashboard/{{ $menuKey }}"
            class="{{ $path === $menuKey ? 'px-4 py-1 bg-white text-primary font-extrabold rounded-full' : 'hover:underline cursor-pointer' }}">
            <li>
                {{ $menuName }}
            </li>
        </a>
    @endforeach
</ul>
