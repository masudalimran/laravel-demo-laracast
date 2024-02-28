<x-admin-layout>
    <x-slot:pageTitle>Create Post</x-slot:pageTitle>
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
                    text="Create Post"
                    isActive
                    fullWidth
                />
            </div>
            <form
                class="m-auto w-[500px]"
                method="POST"
                action="{{ route('backend-post-store') }}"
                enctype="multipart/form-data"
            >
                @csrf
                <x-util.input-image />
                <x-util.input
                    name="title"
                    type="text"
                    label="Title"
                    placeholder="Post Name..."
                    required
                    autofocus
                />
                <x-util.input
                    name="excerpt"
                    type="text"
                    label="Excerpt"
                    placeholder="Excerpt..."
                    required
                />
                <x-util.input-text-area
                    name="body"
                    label="Body of post"
                    required
                />
                <x-util.input
                    name="published_at"
                    type="date"
                    label="Publication Date"
                    placeholder="Published At..."
                    :prevData="(new DateTime())->format('Y-m-d')"
                />
                <div class="my-4">
                    <label class="w-full font-semibold" for="category_id">Category</label>
                    <select
                        class="my-2 w-full rounded-full bg-secondary px-4 py-2"
                        id="category_id"
                        name="category_id"
                    >
                        @foreach ($categories as $category)
                            <option value={{ $category->id }}
                                {{ old('category_id') === $category->id ? 'selected' : '' }}
                            >
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="my-4 flex items-center gap-2">
                    <input
                        class="h-4 w-4 cursor-pointer"
                        id="recreate"
                        name="recreate"
                        type="checkbox"
                    >
                    <label class="" for="recreate">
                        Continue Create Post
                    </label>
                </div>
                <x-util.submit-button text="Create Post" fullwidth />
            </form>

        </section>
    </x-slot:mainContent>
</x-admin-layout>
