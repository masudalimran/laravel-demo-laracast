<x-admin-layout>
    <x-slot:pageTitle>Create Post</x-slot:pageTitle>
    <x-slot:mainContent>
        <section class="body-padding mx-auto mt-10 mb-44">
            <div class="flex justify-between items-center gap-2 w-[500px] mx-auto">
                @php
                    $backUrl = url()->previous();
                    if (url()->full() === url()->previous()) {
                        $backUrl = '/admin/dashboard';
                    }
                @endphp
                <button class="text-2xl text-red-300 hover:text-red-500 transition">
                    <a href="{{ $backUrl }}">
                        <x-feathericon-arrow-left-circle class="h-14 w-14" />
                    </a>
                </button>
                <x-util.button-v1 text="Create Post" isActive fullWidth />
            </div>
            <form method="POST" action="{{ url()->current() }}" class="w-[500px] m-auto" x-data="{ titleHasError: true, excerptHasError: true, publishedAtHasError: true }">
                @csrf
                <x-util.input label="Title" name="title" placeholder="Post Name..." type="text" required
                    autofocus />
                <x-util.input label="Excerpt" name="excerpt" placeholder="Excerpt..." type="text" required />
                <x-util.input-text-area label="Body of post" name="body" required />
                <x-util.input label="Publication Date" name="published_at" placeholder="Published At..."
                    type="date" />
                <div class="my-4">
                    <label for="category_id" class="font-semibold w-full">Category</label>
                    <select class="px-4 py-2 rounded-full w-full my-2" name="category_id" id="category_id">
                        @foreach ($categories as $category)
                            <option value={{ $category->id }}
                                {{ old('category_id') === $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="my-4 flex gap-2 items-center">
                    <input type="checkbox" name="recreate" id="recreate" class="h-4 w-4 cursor-pointer">
                    <label for="recreate" class="">
                        Create another after this one
                    </label>
                </div>
                <x-util.submit-button text="Create Post" fullwidth />
            </form>

        </section>
    </x-slot:mainContent>
</x-admin-layout>
