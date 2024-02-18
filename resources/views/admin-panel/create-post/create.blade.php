<x-admin-layout>
    <x-slot:pageTitle>Create Post</x-slot:pageTitle>
    <x-slot:mainContent>

        <section class="body-padding mx-auto mt-10 mb-44">
            <div class="flex justify-center items-center gap-2">
                @php
                    $backUrl = url()->previous();
                    if (url()->full() === url()->previous()) {
                        $backUrl = '/admin/dashboard';
                    }
                @endphp
                <x-util.button-v1 text="Go Back" link="{{ $backUrl }}" alternate />
                <x-util.button-v1 text="Create Post" isActive />
            </div>
            <form method="POST" action="/post" class="w-[500px] m-auto" x-data="{ titleHasError: true, excerptHasError: true, publishedAtHasError: true }">
                @csrf
                <x-util.input label="Title" name="title" placeholder="Post Name..." type="text" required
                    autofocus />
                <x-util.input label="Excerpt" name="excerpt" placeholder="Excerpt..." type="text" required />
                <x-util.input-text-area label="Body of post" name="body" />
                <x-util.input label="Publication Date" name="published_at" placeholder="Published At..."
                    type="date" />
                <div class="mt-2 flex gap-2 items-center">
                    <input type="checkbox" name="recreate" class="h-4 w-4 cursor-pointer">
                    <label for="recreate" class="">Create another after this one</label>
                </div>
                <x-util.submit-button text="Create Post" fullwidth />
            </form>

        </section>
    </x-slot:mainContent>
</x-admin-layout>
