<x-layout>
    <x-slot:pageTitle>Hopeless Page Found</x-slot:pageTitle>
    <x-slot:mainContent>
        <section class="body-padding">
            <div class="uppercase text-center my-12">
                <p class="text-7xl my-2 font-rubik text-primary">404 Error!</p>
                <p class="my-2">I wish I could do something to help but,</p>
                <p class="text-2xl my-2 font-rubik text-primary">The URL!</p>
                <p class="my-2">you know the thing you see in the address bar?</p>
                <p class="my-2">It is dead (Or Never Lived to begin with)</p>
                <div class="py-8 bg-secondary">
                    <p class="text-xl my-4">
                        Only Thing I can help you with, is the link to the
                    </p>
                    <div class="flex justify-center items-center gap-4 group">
                        <x-feathericon-arrow-right-circle
                            class="h-12 w-12 text-primary group-hover:text-black group-hover:scale-110 transition duration-150" />
                        <a href="/">
                            <p
                                class="text-5xl my-4 text-center font-rubik w-full text-primary group-hover:text-black transition duration-150">
                                HOME PAGE</p>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </x-slot:mainContent>
</x-layout>
