<x-admin-layout>
    <x-slot:pageTitle>Edit Post</x-slot:pageTitle>
    <x-slot:mainContent>
        <section class="body-padding mx-auto mb-44 mt-10">
            <div class="mx-auto flex w-[500px] items-center justify-between gap-2">
                @php
                    $backUrl = url()->previous();
                    if (url()->full() === url()->previous()) {
                        $backUrl = '/' . getAdminUrl() . '/dashboard/posts';
                    }
                @endphp
                <button class="text-2xl text-red-300 transition hover:text-red-500">
                    <a href="{{ $backUrl }}">
                        <x-feathericon-arrow-left-circle class="h-14 w-14" />
                    </a>
                </button>
                <x-util.button-v1
                    text="Edit Post - {{ $currentPost->title }}"
                    isActive
                    fullWidth
                />
            </div>
            <form
                class="m-auto w-[500px]"
                method="POST"
                action="/{{ getAdminUrl() }}/dashboard/posts/{{ $currentPost->id }}"
                enctype="multipart/form-data"
            >
                @csrf
                @method('PATCH')

                <x-util.input-image :prevData="$currentPost->imgUrl" />
                <x-util.input
                    name="title"
                    type="text"
                    label="Title"
                    placeholder="Post Name..."
                    required
                    :prevData="$currentPost->title"
                    autofocus
                />
                <x-util.input
                    name="excerpt"
                    type="text"
                    label="Excerpt"
                    placeholder="Excerpt..."
                    required
                    :prevData="$currentPost->excerpt"
                />
                <x-util.input-text-area
                    name="body"
                    label="Body of post"
                    required
                    :prevData="$currentPost->body"
                />

                @php
                    $prevPublishedAt = null;
                    if ($currentPost->published_at) {
                        $prevPublishedAt = date('Y-m-d', strtotime($currentPost->published_at));
                    }
                @endphp
                <x-util.input
                    name="published_at"
                    type="date"
                    label="Publication Date"
                    placeholder="Published At..."
                    :prevData="$prevPublishedAt"
                />
                <div class="my-4">
                    <label class="w-full font-semibold" for="category_id">Category</label>
                    <select
                        class="my-2 w-full rounded-full px-4 py-2"
                        id="category_id"
                        name="category_id"
                    >
                        @foreach ($categories as $category)
                            @if (old('category_id'))
                                <option value={{ $category->id }}
                                    {{ old('category_id') === $category->id ? 'selected' : '' }}
                                >
                                    {{ $category->name }}
                                </option>
                            @else
                                <option value={{ $category->id }}
                                    {{ $currentPost->category_id === $category->id ? 'selected' : '' }}
                                >
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
