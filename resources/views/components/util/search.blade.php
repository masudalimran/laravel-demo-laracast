@props(['preData'])
@php
    $searchHref = '';
    $searchValid = true;
    $routeName = request()
        ->route()
        ?->getname();
    if ($routeName === 'category' || $routeName === 'home') {
        $searchHref = request()->fullUrlWithQuery(['search' => null]);
    } else {
        $searchHref = '/';
        $searchValid = false;
    }

@endphp
<div x-data="{ open: true }">
    <template x-if="! open">
        <button
            class="rounded-full border-[1px] border-primary bg-primary text-white hover:opacity-80 h-[30px] px-[.4rem]"
            @click="open = true">
            <x-feathericon-search class="h-4 w-4 cursor-pointer" />
        </button>
    </template>
    @if ($searchValid)
        <template x-if="open">
            <form method="GET" action="#" class="flex-1 ">
                <div class="w-[200px] flex items-center justify-between group">
                    <input
                        class="h-[30px] rounded-tl-xl rounded-bl-xl border-[1px] border-r-0 border-primary outline-primary outline-1 px-4 w-full"
                        placeholder="Type Here..." name="search" value="{{ isset($preData) ? $preData : '' }}" />
                    @if (isset($preData) && $preData !== '')
                        <a href="{{ $searchHref }}">
                            <button type="button"
                                class="border-[0px] border-y-primary text-black opacty-0 hover:opacity-80 h-[30px] px-0 w-0 group-hover:w-full group-hover:opacity-100 group-hover:px-2 group-hover:border-y-[1px]">
                                <x-feathericon-x class="h-4 w-4 cursor-pointer" />
                            </button>
                        </a>
                    @endif
                    <button type="submit"
                        class="rounded-tr-xl rounded-br-xl border-[1px] border-primary bg-primary text-white hover:opacity-80 h-[30px] px-2">
                        <x-feathericon-search class="h-4 w-4 cursor-pointer" />
                    </button>
                </div>
            </form>
        </template>
    @endif
</div>
