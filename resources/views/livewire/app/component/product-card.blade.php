<div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-200">
    <x-card>
        <x-slot:title class="text-sm"> {{ $product->name }} </x-slot:title>

        <x-slot:figure class="relative group">
            <img src='https://picsum.photos/500/200'
                 class="w-full h-auto transform group-hover:scale-125  transition-transform duration-500 ease-in-out"
                 alt="{{ $product->name }}"/>

            <div class="absolute inset-0 bg-black opacity-5"></div>

            <div class="absolute top-0 right-0 p-3 flex space-x-2">
                <x-button data-tip="موردعلاقه" spinner="addFavorite" wire:click="addFavorite({{$product->id}})" icon="o-check"
                          class="tooltip tooltip-left btn-circle btn-xs  bg-opacity-10 text-white "/>
            </div>
            <div class="absolute top-0 left-0 p-3 flex space-x-2">
                <x-badge value="{{ $product->discount ?? 0 }}%" class="badge badge-error text-white"/>
            </div>
        </x-slot:figure>

        <x-slot:menu>
            <span class="tooltip font-bold" data-tip="تومان">
                {{ number_format($product->variants()->first()->price ?? 0) }} </span>
            <x-icon name="o-check-badge"></x-icon>
        </x-slot:menu>
    </x-card>
</div>
