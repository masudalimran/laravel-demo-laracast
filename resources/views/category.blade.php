<x-layout>
    <x-slot:pageTitle>Category | {{ $currentCategory->name }}</x-slot:pageTitle>
    <x-slot:mainContent>
        {{-- Hero section start --}}
        <section class="body-padding grid grid-cols-[1fr_2fr_1fr]">
            @foreach ($postsByCategory->shuffle()->take(5) as $post)
                @if ($loop->iteration === 1)
                    <div class="col-start-1 col-end-2 row-start-2 row-end-3">
                        <x-post.mini-card :post="$post" />
                    </div>
                @elseif ($loop->iteration === 2)
                    <div
                        class="col-start-2 {{ count($postsByCategory) < 5 ? 'col-end-4' : 'col-end-3' }} row-start-1 row-end-3">
                        <x-post.focus-card :post="$post" />
                    </div>
                @else
                    <x-post.mini-card :post="$post" />
                @endif
            @endforeach
        </section>
        {{-- Hero section end --}}

        {{-- Main Body Section Start --}}
        <div class="body-padding grid grid-cols-[2.5fr_1fr] auto-rows-auto my-12">
            <section>
                <p class="px-4 text-xl font-semibold">
                    {{ $currentCategory->name }}</p>
                <div class="grid grid-cols-2">
                    @foreach ($postsByCategory->slice(0, 2) as $post)
                        <div class="">
                            <x-post.overlay-card :post="$post" />
                        </div>
                    @endforeach

                    @foreach ($postsByCategory->slice(2, 1) as $post)
                        <div class="col-start-1 col-end-3 row-start-2">
                            <x-post.overlay-card :post="$post" />
                        </div>
                    @endforeach

                </div>
            </section>

            <section
                class="col-start-2 col-end-3 row-start-1 row-end-3 flex flex-col justify-between self-start sticky top-0">
                <x-post.sidebar />
            </section>

            {{-- Directed Content Start --}}
            <section class="bg-white rounded-md">
                @if (count($directedPosts) > 0)
                    @if (request('search'))
                        <p class="p-4 text-center text-2xl bg-primary text-white rounded-xl capitalize">
                            {{ count($directedPosts) }} Search result found
                        </p>
                    @endif
                    <div class="flex flex-col gap-4">
                        @foreach ($directedPosts as $post)
                            <div class="">
                                <x-post.traditional-card :post="$post" />
                            </div>
                        @endforeach
                    </div>
                    @if (!request('search'))
                        {{ $directedPosts->links() }}
                    @endif
                @else
                    <p class="p-4 text-center text-2xl bg-red-300 rounded-xl capitalize">No match found while searching
                        for
                        <span class="bg-primary px-4 py-2 rounded-full text-white">'{{ request('search') }}'</span>
                    </p>
                @endif
            </section>
        </div>
        {{-- Main Body Section End --}}
    </x-slot:mainContent>
</x-layout>
