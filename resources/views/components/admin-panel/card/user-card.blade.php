@props(['user'])
<article
    class="basis-1/3 py-4 flex gap-2 justify-start items-start hover:shadow-lg rounded-lg p-2 transition duration-300">
    <div class="flex flex-col justify-start items-start gap-1">
        <p class="uppercase font-semibold text-sm">{{ $user->name }}</p>
        <p class="lowsercase font-thin text-sm flex-center gap-2">
            Created:
            {{ \Carbon\Carbon::parse($user->created_at)->toDayDateTimeString() }}
        </p>
    </div>
</article>
