<div x-data="{ open: false }" class="my-4">
    <p class="text-justify font-thin text-sm   rounded-md leading-[2.3]">

                <span x-show="!open">
          {{ strip_tags(\Illuminate\Support\Str::limit($product->details,355,'......')) }}
        </span>
        <span x-show="open">
         {!! $product->details !!}
        </span>

        <button
            @click="open = !open"
            class="text-blue-500 hover:underline mt-2">
            <span class=" link-primary font-bold" x-show="!open">ادامه توضیحات...</span>
            <span class="link-primary font-bold" x-show="open">کمتر</span>
        </button>

    </p>


</div>
