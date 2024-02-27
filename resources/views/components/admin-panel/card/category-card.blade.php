@props(['category'])
<article
    class="py-4 flex gap-2 justify-start items-start  border-b-2 border-transparent hover:border-black  p-2 transition duration-300">
    <div class="flex flex-col justify-start items-start gap-1">
        <p class="uppercase font-semibold text-sm">{{ $category->name }}</p>
        <p class="lowsercase font-thin text-sm flex-center gap-2">
            Created:
            {{ \Carbon\Carbon::parse($category->created_at)->toDayDateTimeString() }}
        </p>
    </div>
</article>
