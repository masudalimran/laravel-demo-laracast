@props([
    'label' => 'Body',
    'name' => 'body',
    'maxChar' => 3000,
    'prevData' => null,
])
@php
    $dummyData =
        'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellat facilis inventore expedita quae, voluptatem obcaecati ratione consectetur, nesciunt reprehenderit veritatis repellendus facere animi odit vero dolore id quo dolores, itaque quos. Natus molestias eligendi atque vitae perspiciatis molestiae, ad incidunt vero earum itaque fugit corrupti pariatur consectetur quod fuga, alias ex. Soluta eveniet deleniti ducimus autem nisi velit, architecto sit consectetur, impedit vero nemo dicta non dolores culpa possimus tenetur praesentium adipisci, aliquid nihil facilis. Aspernatur asperiores placeat ipsum soluta nihil. Numquam quo veniam laboriosam aliquam, nihil fugit blanditiis porro doloremque. Exercitationem ut ex beatae alias. Sed deleniti doloremque atque veritatis consequuntur earum quam eum architecto omnis id voluptate exercitationem natus explicabo, reiciendis, molestias possimus, labore cum inventore magni quos aliquam modi. Laborum ad a vitae voluptatum porro voluptatibus sit expedita modi dolorem, possimus perferendis corrupti reiciendis id cupiditate temporibus exercitationem suscipit odit? Possimus tenetur asperiores quas quia praesentium ducimus animi quo debitis aperiam beatae! Esse reiciendis quia harum rerum iusto, quasi voluptate aliquam doloremque illum culpa quibusdam quaerat voluptatum accusantium hic dicta quisquam provident sit ducimus dignissimos officiis suscipit. Quo asperiores molestias sint magnam cumque expedita optio iusto consequatur explicabo veniam tempore molestiae consequuntur delectus ab, rem repudiandae vitae? Dolorem maxime rerum qui perspiciatis quisquam id nesciunt soluta ducimus, nobis harum ipsum sunt facilis? Amet omnis eius cum labore similique et doloremque repudiandae reprehenderit quasi assumenda, voluptatem laborum. Odit esse pariatur rem, mollitia minima rerum iste non cum perferendis voluptatem. Odio nemo maxime neque inventore blanditiis quis optio quaerat possimus assumenda magni eos impedit, nostrum nam cumque excepturi, ab sunt, placeat aut error voluptate esse amet illo aperiam adipisci. Corrupti consequuntur laboriosam voluptate quasi ab esse fuga mollitia atque reprehenderit suscipit in necessitatibus, nesciunt exercitationem omnis debitis quibusdam sint pariatur quia rem ea natus placeat magni. Dicta, laudantium. Culpa laborum sint rem nobis rerum quas praesentium quisquam, nam perferendis repellat facilis eaque ratione esse aut corporis beatae doloribus quod enim voluptate labore eius asperiores deleniti ullam? Sed commodi atque enim architecto quam voluptatum fugit voluptates voluptas natus dolore. Minima tempore ';
@endphp
<div x-data="{ content: '{{ old($name, $prevData) }}', hasError: true }" class="my-4">
    <label for="{{ $name }}" class="w-full font-semibold">
        {{ $label }}
    </label>
    <textarea rows="{{ isset($maxChar) ? $maxChar / 200 : 15 }}" name="{{ $name }}" id="{{ $name }}"
        maxlength="{{ $maxChar }}" x-model='content'
        {{ $attributes->merge(['class' => 'px-4 py-2 w-full outline-none border-white focus:border-primary focus:bg-secondary border-2 resize-none rounded-xl transition duration-500']) }}
        x-on:input.change="hasError = false">
    </textarea>
    <div class="flex justify-between items-center my-2 gap-4">
        <button class="px-2 py-1 text-xs bg-primary hover:opacity-70 rounded text-white" type="button"
            x-on:click="content = '{{ $dummyData }}'">
            Generate Dummy Data
        </button>
        <p class="font-extralight mr-2 "><span x-text="content.length"></span>/{{ $maxChar }}</p>
    </div>
    @error($name)
        <p class="text-red-500" x-show="hasError">{{ $message }}</p>
    @enderror
</div>
