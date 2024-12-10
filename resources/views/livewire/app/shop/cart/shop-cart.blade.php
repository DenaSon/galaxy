<div>
    @php
        $carts = Auth::check() ? Auth::user()->carts()->with(['product.images', 'product.variants', 'variant'])->get() : collect();
    @endphp
    <section class="container mx-auto p-0 sm:p-4">
        <h3 class="p-3">
            <span class="font-black text-sm">سبد خرید شما </span>
            <x-badge class="text-xs badge badge-primary" value="{{ $carts->count() }}"/>
        </h3>
        <hr/>
        <div class="flex flex-col md:flex-row gap-4 p-2 sm:p-4">


            <div class="flex-1  rounded border-b">
                @foreach($carts as $index => $cart)

                    <div class="flex flex-col p-4 rounded  shadow-lg border-t">

                        <div class="flex items-start gap-4">


                                <img src="{{ asset($cart->product->images->first()?->file_path) }}"
                                     alt="تصویر محصول" class="w-24 h-24 rounded">





                            <div class="flex-1">
                                <h3 class="text-sm font-semibold text-gray-800">{{ $cart?->product?->name }}</h3>
                                <div class="text-xs text-gray-600 mt-2">
                                    <p class="text-black m-1">نام نوع : {{ $cart->variant->type }}</p>
                                    <p class="mt-1">وزن کل: {{ ($cart->variant->weight * $cart->quantity) / 1000 }} کیلو


                                    </p>
                                    <p class="mt-1">ارسال: 1 روز آینده</p>
                                </div>
                            </div>


                            <div class="text-right hidden sm:block">
                                <p class="text-primary font-bold"> {{ number_format($cart?->variant->price * $cart?->quantity ?? 0)  }}
                                    تومان</p>

                            </div>
                        </div>


                        <div class="flex items-center justify-between mt-4 pt-4">

                            <div class="flex items-center border border-gray-300 rounded overflow-hidden">
                                <x-button spinner

                                          icon="o-plus"

                                          wire:click="increaseQty({{ $cart->id}})"
                                          class="w-10    text-primary font-bold bg-white border-none rounded-none hover:bg-gray-50">

                                </x-button>


                                <span
                                    class="w-12 h-10 flex items-center justify-center bg-white text-primary font-semibold">
    {{ $cart->quantity }}
</span>

                                <x-button spinner
                                          icon="o-minus"

                                          wire:click="decreaseQty({{ $cart->id}})"
                                          class="w-10    text-primary font-bold bg-white border-none rounded-none hover:bg-gray-50">

                                </x-button>


                            </div>


                            <div class="text-right sm:hidden">
                                <p class="text-primary font-bold">
                                    <span> {{ number_format($cart?->variant->price * $cart?->quantity ?? 0)  }}</span>
                                    <span class="text-xs font-thin">تومان</span>
                                </p>

                            </div>


                        </div>
                    </div>

                @endforeach

                <div class="h-32"></div>


            </div>

            <div class="md:flex-[0.3]   p-0 sm:-2 rounded hidden md:block">

                @include('livewire.app.shop.cart.inc.cart-price')

            </div>

        </div>

    </section>


    <div
        class="w-full bg-white border border-b p-4 fixed bottom-16 left-0 h-16 md:hidden flex items-center justify-between"
        style="z-index: 10000">
        <x-progress wire:loading value="10" max="100" class="progress-primary h-1 bg-white absolute top-0 left-0 w-full"
                    indeterminate/>


        @include('livewire.app.shop.cart.inc.order-button')

        <!-- بخش جمع خرید -->
        <div class="flex flex-col items-start">
            <span class="text-xs font-thin text-gray-700">جمع خرید</span>
            <span class="text-sm font-black text-gray-700">{{ number_format($cartCost ?? 0) }}</span>
        </div>
    </div>

    @livewire('app.component.address-modal')
</div>
