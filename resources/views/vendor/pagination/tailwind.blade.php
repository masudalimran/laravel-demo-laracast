@if ($paginator->hasPages())
    <div class="p-4 flex items-center gap-4">
        @if (!$paginator->onFirstPage())
            <a href="{{ $paginator->previousPageUrl() }}">
                <button
                    class="flex items-center px-4 py-2 gap-2 hover:bg-red-400 border-[3px] border-red-400 hover:text-white bg-white text-red-400 text-thin rounded-md transition group"
                    id="load-more">Go Back
                    <x-feathericon-arrow-left-circle class="text-red-400 group-hover:text-white transition" />
                </button>
            </a>
        @endif
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}">
                <button
                    class="flex items-center px-4 py-2 gap-2 hover:bg-primary border-[3px] border-primary hover:text-white bg-white text-primary text-thin rounded-md transition group"
                    id="load-more">Load More
                    <x-feathericon-arrow-right-circle class="text-primary group-hover:text-white transition" />
                </button>
            </a>
        @endif
        <p class="px-4">Page {{ $paginator->currentPage() }} out of {{ $paginator->lastPage() }}</p>
    </div>
@endif
