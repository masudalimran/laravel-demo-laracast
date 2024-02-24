@props(['totalPosts', 'somePosts', 'totalCategories', 'someCategories', 'totalUsers', 'someUsers'])
<x-admin-layout>
    <x-slot:pageTitle>Dashboard</x-slot:pageTitle>
    <x-slot:mainContent>
        <div class="flex justify-center gap-6 mt-6 [&>section]:flex-1 w-[80%] m-auto">

            <section>
                <x-util.button-v1 :text="'Total Posts ' . $totalPosts" fullWidth noRound />
                <div class="border-2 border-primary rounded px-4 py-8 bg-secondary h-full">
                    @foreach ($somePosts as $post)
                        <x-post.avatar-card :post="$post" isBackend />
                    @endforeach
                </div>
            </section>

            <section>
                <x-util.button-v1 :text="'Total Categories ' . $totalCategories" fullWidth noRound />
                <div class="border-2 border-primary rounded px-4 py-8 bg-secondary h-full">
                    @foreach ($someCategories as $category)
                        <x-admin-panel.card.category-card :category="$category" />
                    @endforeach
                </div>
            </section>

            <section>
                <x-util.button-v1 :text="'Total Users ' . $totalUsers" fullWidth noRound />
                <div class="border-2 border-primary rounded px-4 py-8 bg-secondary h-full">
                    @foreach ($someUsers as $user)
                        <x-admin-panel.card.user-card :user="$user" />
                    @endforeach
                </div>
            </section>

            <section>
                <x-util.button-v1 :text="'Total Subscribers ' . $totalSubscribers" fullWidth noRound />
                <div class="border-2 border-primary rounded px-4 py-8 bg-secondary h-full">
                    @foreach ($someSubscribers as $subscriber)
                        <x-admin-panel.card.subscriber-card :subscriber="$subscriber" />
                    @endforeach
                </div>
            </section>
        </div>
    </x-slot:mainContent>
</x-admin-layout>
