@php
    $path = basename(request()->path());
    $menus = ['post' => 'Post', 'category' => 'Category', 'user' => 'User'];
@endphp
<ul class="flex items-center gap-6 text-xl font-thin ">
    @foreach ($menus as $menuKey => $menuName)
        <a href="/admin/dashboard/{{ $menuKey }}"
            class="{{ $path === $menuKey ? 'text-black underline pointer-events-none' : 'hover:underline cursor-pointer' }}">
            <li>{{ $menuName }}
            </li>
        </a>
    @endforeach
</ul>
