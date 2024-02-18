<div class="m-2 p-6 bg-white rounded-xl" x-data="{ emailHasError: true }">

    @isset($errors)
        @error('subscriber')
            <x-util.scroll-point />
        @elseif(session()->has('subscribed'))
            <x-util.scroll-point />
        @enderror
    @endisset

    <p class="text-xl font-semibold">Subscribe Now </p>
    <p class="text-sm text-primary mt-2 uppercase"> {{ $subCount ?? 0 }} current subscriber
        {{ $subCount > 0 ? "'s" : '' }}
    </p>
    <p class="my-4 font-extralight">Get the latest creative news from Atlas magazine</p>
    <form class="flex items-center" method="post" action="/newsletter">
        @csrf
        <div class="basis-3/5">
            <input
                class="h-[40px] rounded-tl-xl rounded-bl-xl border-[1px] border-primary outline-primary outline-1 px-4 w-full"
                placeholder="Your Email.." name="subscriber" type="email" x-on:input.change="emailHasError = false"
                required value="{{ old('subsriber') }}" />
        </div>
        <div class="basis-2/5">
            <button type="submit"
                class="rounded-tr-xl rounded-br-xl border-[1px] border-primary bg-primary text-white hover:opacity-80 h-[40px] w-full">
                Sign Up
            </button>
        </div>
    </form>
    <div class="h-8">
        @isset($errors)
            @error('subscriber')
                <p class="text-red-500 pl-2 mt-2" x-show="emailHasError">{{ $message ?? 'Something went wrong!' }}</p>
            @enderror
        @endisset
    </div>
</div>
