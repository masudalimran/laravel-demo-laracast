<x-admin-layout>
    <x-slot:pageTitle>Manage Posts</x-slot:pageTitle>
    <x-slot:mainContent>
        <section class="body-padding my-6">
            @foreach ($posts as $post)
                <x-admin-panel.card.manage-post-card :post="$post" />
            @endforeach
        </section>

        <div class="fixed bottom-20 right-12 z-20">
            <x-util.icon-button text="Create" link="{{ url()->current() }}/create">
                <x-feathericon-plus />
            </x-util.icon-button>
        </div>
        <div class="sticky bottom-0 left-0 right-0 bg-white">
            <div class="body-padding">
                {{ $posts->links() }}
            </div>
        </div>
    </x-slot:mainContent>
</x-admin-layout>
