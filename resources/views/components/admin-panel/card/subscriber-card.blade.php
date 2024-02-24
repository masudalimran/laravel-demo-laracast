@props(['subscriber'])
<article
    class="basis-1/3 py-4 flex gap-2 justify-start items-start border-b-2 border-transparent hover:border-black  p-2 transition duration-300">
    <div class="flex flex-col justify-start items-start gap-1">
        <p class="text-sm">{{ $subscriber->email }}</p>
        <p class="lowsercase font-thin text-sm flex-center gap-2">
            Subscribed:
            {{ \Carbon\Carbon::parse($subscriber->created_at)->toDayDateTimeString() }}
        </p>
    </div>
</article>
