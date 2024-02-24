@php
    $menus = ['post' => 'Post', 'category' => 'Category', 'user' => 'User', 'subscriber' => 'Subscriber'];
    // dd(request()->route()->getname());
    function menuExist(string $menu)
    {
        $pathName = request()->route()->getname();
        // echo $pathName;
        if (str_contains($pathName, $menu)) {
            return true;
        }
        return false;
    }
@endphp

<ul class="flex items-center gap-2 text-xl font-thin">
    @foreach ($menus as $menuKey => $menuName)
        <a href="/{{ getAdminUrl() }}/dashboard/{{ $menuKey }}"
            class=" text-center px-4 py-2 rounded-full {{ menuExist($menuKey) ? 'bg-white text-primary font-extrabold cursor-default' : 'hover:bg-white hover:text-primary hover:font-extrabold' }} tranistion duration-150 delay-75">
            <li>
                {{ $menuName }}
            </li>
        </a>
    @endforeach
</ul>
