@props(['items'])

@php
    $items = $items[0];
    $nextPageNumber = $items->currentPage() + 1;
    $prevPageNumber = $items->currentPage() - 1;

    $nextPageUrl = null;
    $prevPageUrl = null;

    // dd(http_build_query(['page' => $nextPageNumber], '11', "$"));
    if ($nextPageNumber <= $items->lastpage()) {
        $nextPageUrl = "$currentUri?page=$nextPageNumber&" . http_build_query(request()->except('page'));
    }
    if ($prevPageNumber === 1) {
        $prevPageUrl = $currentUri . '?' . http_build_query(request()->except('page'));
    }
    if ($prevPageNumber > 1) {
        $prevPageUrl = "$currentUri?page=$prevPageNumber&" . http_build_query(request()->except('page'));
    }
@endphp

<div class="p-4 flex items-center gap-4">
    @if ($prevPageUrl)
        <a href="{{ $prevPageUrl }}">
            <button
                class="flex items-center px-4 py-2 gap-2 bg-red-400 border-[3px] border-red-400 hover:border-black text-white text-thin rounded-md transition group"
                id="load-more">Go Back
                <x-feathericon-arrow-left-circle class="group-hover:text-black transition" />
            </button>
        </a>
    @endif
    @if ($nextPageUrl)
        <a href="{{ $nextPageUrl }}">
            <button
                class="flex items-center px-4 py-2 gap-2 bg-primary border-[3px] border-primary hover:border-black text-white text-thin rounded-md transition group"
                id="load-more">Load
                More
                <x-feathericon-arrow-right-circle class="group-hover:text-black transition" />
            </button>
        </a>
    @endif
</div>
