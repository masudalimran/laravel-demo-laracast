@props(['comment', 'isLast'])
<div x-data="{ highlightClass: 'border-primary' }">
    <div :class="`p-4 border-4  rounded-xl {{ session()->has('success') && $isLast ? '${highlightClass}' : 'border-transparent' }} transition duration-300`"
        x-init="setTimeout(
            () => highlightClass = 'border-transparent', 6000)">
        <div class="flex gap-2 items-center flex-nowrap">
            <img src="/img/users/{{ mt_rand(1, 16) }}.jpg" class="object-cover h-10 w-10 rounded-full"
                style="background-image:url('/img/loading.gif')" />
            <div>
                <p class="text-xl">{{ $comment->author->name }}</p>
                <time class="font-thin text-sm">{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</time>
            </div>
        </div>
        <hr class="my-2" />
        <p class="font-light">{{ $comment->comment }} </p>
    </div>
</div>
