<x-modal wire:model="cartModal" class="w-full p-2">


    <x-card class="space-y-2 p-0"  separator progress-indicator >

        <div class="p-0 text-sm font-bold text-center mt-1">
           {{ $product->name }}
        </div>
        <x-hr/>

        @foreach($product->load(['carts','carts.variant'])->carts()->where('user_id', auth()->id())->get() as $cart)
            <div wire:key="{{ $product->id.'-'.$cart->id }}"
                 class="flex items-center justify-between mb-4 hover:bg-gray-100 p-2 rounded ">

                <span class="text-gray-700 font-medium"> {{ $cart->variant->type }} </span>


                <div class="flex items-center">

                    <x-button wire:loading.attr="disabled" tooltip="افزایش" wire:click="increaseVariant({{$cart}})" icon="o-plus"
                              class="btn-sm rounded-full bg-primary text-white h-6"/>


                    <x-badge  value="{{ $cart->quantity }}" data-tip="تعداد"
                             class="tooltip mx-4 w-10 h-10 flex items-center justify-center border rounded-md text-gray-800 font-semibold bg-gray-50">
                    </x-badge>


                    <x-button wire:loading.attr="disabled"  tooltip="کاهش" wire:click="decreaseVariant({{$cart}})" icon="o-minus"
                              class="btn-sm rounded-full bg-orange-400 text-white h-6"/>
                </div>

            </div>

        @endforeach

        <div class="text-center flex justify-between w-full">
            <x-button icon="o-shopping-cart" class="btn-primary btn-sm hover:bg-violet-700" label="سبد خرید"/>
            <x-button icon="o-building-storefront" class="btn-neutral btn-sm hover:bg-violet-600" label="محصولات"/>
        </div>


    </x-card>


</x-modal>

