@props(['subscriber'])
<article
    class="basis-1/3 py-4 flex gap-2 justify-start items-start hover:shadow-lg rounded-lg p-2 transition duration-300">
    <div class="flex flex-col justify-start items-start gap-1">
        <p class="text-sm">{{ $subscriber->email }}</p>
        <p class="lowsercase font-thin text-xs flex-center gap-2">
            Subscribed:
            {{ \Carbon\Carbon::parse($subscriber->published_at)->diffForHumans() }}
        </p>
    </div>
</article>
