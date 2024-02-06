<div class="bg-secondary px-[20rem] flex justify-end items-center py-2 font-extralight text-sm sticky top-0">
    <div class="flex items-center gap-[1rem] text-sm font-light">
        @auth
            <p class="">Welcome,
                <span class="capitalize text-primary font-bold">
                    {{ auth()->user()->name }}
                </span>
            </p>
            <a href="/" class="hover:underline">Frontend</a>
            <form method="POST" action="/admin/logout">
                @csrf
                <button type="submit" class="hover:underline cursor-pointer">Logout</button>
            </form>
        @endauth
    </div>
</div>
