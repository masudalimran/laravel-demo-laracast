<div class="bg-secondary px-[20rem] flex justify-between items-center py-2 font-extralight text-sm sticky top-0">
    <div class="flex items-center gap-[1rem] text-sm font-light">
        @php
            $routeName = request()
                ->route()
                ?->getname();
            $isLoginOrRegisterPage = false;

            if (($routeName === 'register-page') | ($routeName === 'login-page')) {
                $isLoginOrRegisterPage = true;
            }
        @endphp

        @auth
            <p class="">Welcome,
                <span class="capitalize text-primary font-bold">
                    {{ auth()->user()->name }}
                </span>
            </p>
            @if (auth()->user()?->isAdmin === 1)
                <a href="/admin" class="hover:underline cursor-pointer"> Admin Panel</a>
            @endif
            <form method="POST" action="/logout">
                @csrf
                <button type="submit" class="hover:underline cursor-pointer">Logout</button>
            </form>
        @else
            @if (!$isLoginOrRegisterPage)
                <a href="/register" class="hover:underline cursor-pointer"> Login/Register</a>
            @endif
            <p class="hover:underline cursor-pointer">Terms & Conditions</p>
            <p class="hover:underline cursor-pointer">Contact</p>
        @endauth
    </div>

    <div class="flex gap-2 items-center justify-between">
        <p class="flex items-center gap-1 icon-clickable ">
            <x-feathericon-linkedin class="h-4 w-4 " />
            80k
        </p>
        <p class="flex items-center gap-1 icon-clickable ">
            <x-fab-x-twitter class="h-4 w-4" />
            60k
        </p>

        <p class="px-2">|</p>
        <p>{{ Carbon\Carbon::now()->format('F d, Y') }}</p>
    </div>

</div>
