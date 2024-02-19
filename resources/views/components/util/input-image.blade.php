@props(['prevData'])
<div class="my-4" x-data="{ uploadInfo: { src: '{{ isset($prevData) ? $prevData : null }}' } }">

    {{-- Upload Box --}}
    <template x-if="!uploadInfo.src">
        <label for="img">
            <div
                class="w-full h-[300px] bg-secondary rounded-xl flex-center cursor-pointer group/imgUpload hover:shadow-md shadow-primary/35  overflow-hidden">
                <div class="flex-center flex-col gap-2 ">
                    <x-feathericon-image
                        class="h-24 w-24 text-primary
                        group-hover/imgUpload:scale-150 group-hover/imgUpload:translate-y-12 group-hover/imgUpload:opacity-70 transition duration-200" />
                    <p
                        class="bg-primary text-white basic-padding rounded-full
                        group-hover/imgUpload:translate-x-[100vh] transition-all duration-300">
                        Upload Blog Image</p>
                    <p class="group-hover/imgUpload:-translate-x-[100vh] transition-all duration-300">Recommended:
                        400x300
                    </p>
                </div>
            </div>
        </label>
    </template>

    {{-- Preview --}}
    <template x-if="uploadInfo.src">
        <div>
            <div class="relative w-full h-[300px] flex-center rounded-xl ">
                <div
                    class="absolute-all z-10 backdrop:blur-lg bg-black/0 hover:bg-black/40
                flex justify-end items-start transition duration-150 group/removeImg rounded-xl">
                    <x-feathericon-x-circle
                        class="h-12 w-12 text-white invisible group-hover/removeImg:visible mr-4 mt-4
                    cursor-pointer hover:scale-110 hover:text-red-500 transition"
                        title="Remove Image" @click="uploadInfo = {}" />
                </div>
                <img :src="uploadInfo.src" class="h-[300px] w-full object-cover rounded-xl" />
            </div>
            <div class="my-4">
                <template x-if="uploadInfo.name">
                    <p>Filename:
                        <span x-text="uploadInfo.name" class="my-2 text-sm font-light italic" />
                    </p>
                </template>
                <template x-if="uploadInfo.size">
                    <p>Size:
                        <span
                            x-text="
                        (uploadInfo.size/1000000) > 1
                        ? (uploadInfo.size/1000000).toFixed(2)+' mb'
                        : (uploadInfo.size/1000).toFixed(2)+' kb'"
                            class="my-2 text-sm font-light italic" />
                    </p>
                </template>
            </div>
        </div>
    </template>

    {{-- Input Hidden --}}
    <input name="img" id="img" type='file'
        @change="
        uploadInfo.src = URL.createObjectURL(event.target.files[0]);
        uploadInfo.size = event.target.files[0].size;
        uploadInfo.name = event.target.files[0].name;"
        accept="image/*" class="hidden" />
</div>
