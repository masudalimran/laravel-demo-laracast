@props(['prevData' => null])
<div class="my-4" x-data="{
    uploadInfo: {
        src: '{{ handlePostImgPath($prevData) }}'
    },
    hasError: true,
    handlePreview() {
        this.uploadInfo.src = URL.createObjectURL($refs.img.files[0]);
        this.uploadInfo.size = $refs.img.files[0].size;
        this.uploadInfo.name = $refs.img.files[0].name;
    },

}">

    {{-- Upload Box --}}
    <template x-if="!uploadInfo.src">
        <label for="img">
            <div
                class="flex-center group/imgUpload shadow-primary/35 h-[300px] w-full cursor-pointer overflow-hidden rounded-xl bg-secondary hover:shadow-md">
                <div class="flex-center flex-col gap-2">
                    <x-feathericon-image
                        class="h-24 w-24 text-primary transition duration-200 group-hover/imgUpload:translate-y-12 group-hover/imgUpload:scale-150 group-hover/imgUpload:opacity-70"
                    />
                    <p
                        class="basic-padding rounded-full bg-primary text-white transition-all duration-300 group-hover/imgUpload:translate-x-[100vh]">
                        Upload Blog Image
                    </p>
                    <p class="transition-all duration-300 group-hover/imgUpload:-translate-x-[100vh]">
                        Recommended: 400x300
                    </p>
                </div>
            </div>
        </label>
    </template>

    {{-- Preview --}}
    <template x-if="uploadInfo.src">
        <div>
            <input
                name="prevImg"
                type="hidden"
                value="{{ $prevData }}"
            />
            <div class="flex-center relative h-[300px] w-full rounded-xl">
                <div
                    class="absolute-all group/removeImg z-10 flex items-start justify-end rounded-xl bg-black/0 transition duration-150 backdrop:blur-lg hover:bg-black/40">
                    <x-feathericon-x-circle
                        class="invisible mr-4 mt-4 h-12 w-12 cursor-pointer text-white transition hover:scale-110 hover:text-red-500 group-hover/removeImg:visible"
                        title="Remove Image"
                        @click="uploadInfo = {}"
                    />
                </div>
                <img class="h-[300px] w-full rounded-xl object-cover" :src="uploadInfo.src" />
            </div>
            <div class="my-4">
                <template x-if="uploadInfo.name">
                    <p>Filename:
                        <span class="my-2 text-sm font-light italic" x-text="uploadInfo.name" />
                    </p>
                </template>
                <template x-if="uploadInfo.size">
                    <p>Size:
                        <span class="my-2 text-sm font-light italic" x-text="calculateFileSize(uploadInfo.size)" />
                    </p>
                </template>
            </div>
        </div>
    </template>

    {{-- Input Hidden --}}
    <input
        class="hidden"
        id="img"
        name="img"
        type='file'
        x-ref="img"
        accept="image/jpg, image/jpeg, image/png"
        @change="handlePreview"
        x-on:input.change="hasError = false"
    />

    @error('img')
        <p class="text-red-500" x-show="hasError">{{ $message }}</p>
    @enderror
</div>
