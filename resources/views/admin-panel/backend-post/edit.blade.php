<x-admin-layout>
    <x-slot:pageTitle>Edit Post</x-slot:pageTitle>
    <x-slot:mainContent>
        <section class="body-padding mx-auto mt-10 mb-44">
            <div class="flex justify-between items-center gap-2 w-[500px] mx-auto">
                @php
                    $backUrl = url()->previous();
                    if (url()->full() === url()->previous()) {
                        $backUrl = '/admin/dashboard/post';
                    }
                @endphp
                <button class="text-2xl text-red-300 hover:text-red-500 transition">
                    <a href="{{ $backUrl }}">
                        <x-feathericon-arrow-left-circle class="h-14 w-14" />
                    </a>
                </button>
                <x-util.button-v1 text="Edit Post - {{ $currentPost->title }}" isActive fullWidth />
            </div>
            <form method="POST" action="/admin/dashboard/posts/{{ $currentPost->id }}" class="w-[500px] m-auto"
                enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                @php
                    $currentPostImgUrl = str_contains($currentPost->imgUrl, 'blog-img') ? asset('storage/' . $currentPost->imgUrl) : $currentPost->imgUrl;
                @endphp
                <x-util.input-image :prevData="$currentPostImgUrl" />
                <input type="hidden" name="prevImg" value="{{ $currentPost->imgUrl }}" />
                <x-util.input label="Title" name="title" placeholder="Post Name..." type="text" required
                    :prevData="$currentPost->title" autofocus />
                <x-util.input label="Excerpt" name="excerpt" placeholder="Excerpt..." type="text" required
                    :prevData="$currentPost->excerpt" />
                <x-util.input-text-area label="Body of post" name="body" required :prevData="$currentPost->body" />

                @php
                    $prevPublishedAt = null;
                    if ($currentPost->published_at) {
                        $prevPublishedAt = date('Y-m-d', strtotime($currentPost->published_at));
                    }
                @endphp
                <x-util.input label="Publication Date" name="published_at" placeholder="Published At..." type="date"
                    :prevData="$prevPublishedAt" />
                <div class="my-4">
                    <label for="category_id" class="font-semibold w-full">Category</label>
                    <select class="px-4 py-2 rounded-full w-full my-2" name="category_id" id="category_id">
                        @foreach ($categories as $category)
                            @if (old('category_id'))
                                <option value={{ $category->id }}
                                    {{ old('category_id') === $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @else
                                <option value={{ $category->id }}
                                    {{ $currentPost->category_id === $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <x-util.submit-button text="Update Post" fullwidth />
            </form>

        </section>
    </x-slot:mainContent>
</x-admin-layout>
