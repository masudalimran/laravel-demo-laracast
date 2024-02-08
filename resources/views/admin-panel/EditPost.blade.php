<x-admin-layout>
    <x-slot:pageTitle>Edit Post</x-slot:pageTitle>
    <x-slot:mainContent>
        <section class="body-padding">
            <div class="max-w-md mx-auto">
                <x-util.button-v1 text="Edit Post" fullWidth noRound />
                <form action="/" method="post" class="w-full">
                    <x-util.input label="Title" name="title" value="{{ $currentPost->title }}" />
                    <x-util.input label="Excerpt" name="excerpt" value="{{ $currentPost->excerpt }}" />
                    <x-util.input label="Body" name="body" value="{{ $currentPost->body }}" />
                    <x-util.submitButton text="Update" fullwidth />
                </form>
            </div>
        </section>
    </x-slot:mainContent>
</x-admin-layout>
