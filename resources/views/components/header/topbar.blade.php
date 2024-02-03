<div class="bg-secondary px-[20rem] flex justify-between items-center py-2 font-extralight text-sm sticky top-0">
    <div class="flex items-center gap-[1rem] text-sm font-light">
        @auth
            <p class="">Welcome,
                <span class="capitalize text-primary font-bold">
                    {{ auth()->user()->name }}
                </span>
            </p>
            <form method="POST" action="/logout">
                @csrf
                <button type="submit" class="hover:underline cursor-pointer">Logout</button>
            </form>
        @else
            <a href="/register" class="hover:underline cursor-pointer">Login/Register</a>
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
