<x-admin-layout>
    <x-slot:pageTitle>Manage Posts</x-slot:pageTitle>
    <x-slot:mainContent>
        <section class="body-padding my-6">
            @foreach ($posts as $post)
                <article class="shadow-lg p-4 rounded-xl group hover:shadow-xl">
                    <div class="flex justify-between gap-6">
                        <div>
                            <div class="flex items-center gap-2">
                                <div
                                    class="bg-primary w-fit relative flex justify-center items-center p-6 rounded-full border-[1px] border-primary group-hover:bg-secondary transition">
                                    <p class="absolute text-white text-xs group-hover:text-primary transition">
                                        #{{ $post->id }}</p>
                                </div>
                                <div>
                                    <p class="text-xl">{{ $post->title }} </p>
                                    <p class="font-cang font-thin">{{ $post->excerpt }}</p>
                                </div>
                            </div>
                            <hr class="my-4" />
                            <p>{{ substr($post->body, 0, 300) }}
                                @if (strlen($post->body) > 300)
                                    ...
                                @endif
                            </p>
                            <hr class="my-4" />
                            <div class="[&>p]:text-md font-thin">
                                <p>Created At: <span
                                        class="ml-2 font-light text-primary">{{ \Carbon\Carbon::parse($post->created_at) }}</span>
                                </p>
                                @if ($post->updated_at !== $post->created_at)
                                    <p class="text-orange-500">Not Yet Updated</p>
                                @else
                                    <p>Updated At: <span
                                            class="ml-2 font-light text-orange-500">{{ \Carbon\Carbon::parse($post->updated_at) }}</span>
                                    </p>
                                @endif
                                <p>Published At: <span
                                        class="ml-2 font-light text-blue-500">{{ \Carbon\Carbon::parse($post->published_at) }}</span>
                                </p>
                            </div>
                            <hr class="my-4" />
                            <div class="flex gap-2 items-center invisible group-hover:visible">
                                <div
                                    class="flex items-center gap-2 text-red-400 hover:bg-red-500 hover:text-white transition cursor-pointer text-xl border-2 rounded-full px-4 py-2 border-red-400 hover:border-red-500">
                                    <x-feathericon-delete class="" />
                                    Delete
                                </div>

                                <div
                                    class="flex items-center gap-2 text-blue-400 hover:bg-blue-500 hover:text-white transition cursor-pointer text-xl border-2 rounded-full px-4 py-2 border-blue-400 hover:border-blue-500">
                                    <x-feathericon-edit class="" />
                                    Edit
                                </div>
                            </div>
                        </div>
                        <img src="/img/blogs/blog-{{ $post->id }}.jpg"
                            class="w-[200px] object-cover rounded opacity-50 group-hover:opacity-100" />
                    </div>
                </article>
            @endforeach
        </section>
        <div class="fixed bottom-20 right-12 z-20">
            <x-util.button-v1 text="Create" link="?create-post">
                <x-feathericon-plus />
            </x-util.button-v1>
        </div>
        <div class="sticky bottom-0 left-0 right-0 bg-white">
            <div class="body-padding">
                {{ $posts->links() }}
            </div>
        </div>
    </x-slot:mainContent>
</x-admin-layout>
