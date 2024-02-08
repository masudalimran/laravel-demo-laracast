<footer class="bg-neutral-100">
    <div class="body-padding">
        <div class="relative group">
            <div
                class="absolute top-0 bottom-0 left-0 right-0 h-full w-full flex justify-center items-center opacity-0 bg-gradient-to-b from-transparent to-neutral-300 group-hover:opacity-100 z-10 transition duration-300 delay-100 rounded-2xl">
                <button
                    class="px-4 py-2 gap-2 bg-primary border-[3px] border-primary hover:border-black text-white text-thin rounded-md transition">Follow
                    Us On Instagram
                </button>
            </div>
            <section
                class="my-6 flex flex-nowrap justify-evenly items-center gap-4 group-hover:opacity-50 transition duration-300 delay-100">
                <x-footer.prefooter />
            </section>
        </div>
        <div class=" rounded bg-white">
            <div class="max-w-md m-auto">
                <x-util.newsletter />
            </div>
        </div>

        <section class="rounded-xl p-8 bg-white flex justify-evenly items-center gap-12">
            <div class="basis-1/3 font-extralight text-sm">
                <div class="h-[80px] relative">
                    <img src="/img/main-logo-no-bg.png"
                        class="absolute top-[-40px] left-[-12px] object-cover h-[150px] " />
                </div>
                <p class="mb-4 flex items-center">I want to learn more about the greenhouse effect on
                    Venus,
                    about
                    whether there was life on Mars</p>
                <p class="mb-2 flex items-center gap-4"> <x-feathericon-phone-forwarded class="h-4 w-4" /> +34 000 0000
                </p>
                <p class="flex items-center gap-4"><x-feathericon-mail class="h-4 w-4" />example@mail.me</p>
            </div>
            <div class="basis-1/3">
                <x-footer.footer1 />
            </div>
            <div class="basis-1/3">
                <x-footer.footer2 />
            </div>
        </section>
        <div class="my-6 flex justify-between items-center">
            <p class="text-sm font-extralight">Copyright &copy; {{ Carbon\Carbon::now()->format('Y') }} by
                <span class="text-primary">
                    Blogs<sup>TM</sup>
                </span> | All rights reserved.
            </p>
            <div class="flex justify-end items-center gap-4 font-bold">
                <x-feathericon-facebook class="h-4 w-4 icon-clickable" />
                <x-fab-x-twitter class="h-4 w-4 icon-clickable" />
                <x-feathericon-instagram class="h-4 w-4 icon-clickable" />
                <x-feathericon-linkedin class="h-4 w-4 icon-clickable" />
                <x-fab-twitch class="h-4 w-4 icon-clickable" />
            </div>
        </div>
    </div>
</footer>
