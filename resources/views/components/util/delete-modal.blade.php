@props(['title', 'deleteUrl'])
<div x-data="{ showModal: false }">
    <button type="button" @click="showModal = true"
        class="flex items-center gap-2 text-red-400 hover:bg-red-500 hover:text-white transition cursor-pointer text-xl border-2 rounded-full px-4 py-2 border-red-400 hover:border-red-500">
        <x-feathericon-delete class="" />
        Delete
    </button>
    <template x-if="showModal">
        <div class="fixed-screen flex-center bg-white/70 backdrop-blur-sm z-30">
            <div class="border-primary border-2 bg-white">
                <p class="basic-padding bg-primary text-2xl text-white">Do you really want to delete
                    <span class="font-extrabold italic">
                        {{ $title }}
                    </span>?
                </p>
                <div class="flex justify-end items-center gap-2 basic-padding my-2 "
                    @mousedown.outside="showModal = false">
                    <button type="submit" @click="showModal = false"
                        class="basic-padding  border-b-2 border-transparent hover:border-primary">
                        Cancel
                    </button>
                    <form method="POST" action="{{ $deleteUrl }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="flex items-center gap-2 text-red-400 hover:bg-red-500 hover:text-white transition cursor-pointer text-xl border-2 rounded-full px-4 py-2 border-red-400 hover:border-red-500">
                            <x-feathericon-delete class="" />
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </template>
</div>
