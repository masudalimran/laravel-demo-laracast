<x-admin-layout>
    <x-slot:pageTitle>Manage Categories</x-slot:pageTitle>
    <x-slot:mainContent>
        <section class="body-padding my-6 w-full">
            <div class="mx-auto w-fit">
                @foreach ($categories as $category)
                    <x-admin-panel.card.category-card :category="$category" />
                @endforeach
            </div>
        </section>

        <div class="fixed bottom-20 right-12 z-20">
            <x-util.icon-button text="Create" link="{{ url()->current() }}/create">
                <x-feathericon-plus />
            </x-util.icon-button>
        </div>
        <div class="sticky bottom-0 left-0 right-0 bg-white">
            <div class="body-padding">
                {{ $categories->links() }}
            </div>
        </div>
    </x-slot:mainContent>
</x-admin-layout>
