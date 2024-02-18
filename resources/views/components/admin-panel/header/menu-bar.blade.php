@php
    $path = basename(request()->path());
    $menus = ['post' => 'Post', 'category' => 'Category', 'user' => 'User', 'subscriber' => 'Subscriber'];
@endphp

<ul class="flex items-center gap-2 text-xl font-thin">
    @foreach ($menus as $menuKey => $menuName)
        <a href="/admin/dashboard/{{ $menuKey }}"
            class="px-4 py-1 rounded-full {{ $path === $menuKey ? 'bg-white text-primary font-extrabold cursor-default' : 'hover:bg-white hover:text-primary ' }}">
            <li>
                {{ $menuName }}
            </li>
        </a>
    @endforeach
</ul>
