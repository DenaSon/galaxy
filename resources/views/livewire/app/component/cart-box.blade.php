<div>

    @if(Auth::check() && Auth::user()->carts->isNotEmpty())
        <x-drawer wire:model="cartBox" class="w-11/12 lg:w-1/4 relative p-0 py-0 m-0" left style="z-index: 5">


            <div class="mt-0 pb-10  px-2">
                <div class="bg-white rounded overflow-y-auto max-h-[70vh] p-4">

                    <h2 class="text-sm font-bold text-center pb-2">سبد خرید</h2>
                    <hr>
                    <div class="relative">
                        <x-progress wire:loading value="10" max="100"
                                    class="progress-warning h-1 bg-white absolute top-0 left-0 w-full" indeterminate/>
                    </div>

                    @foreach(Auth::user()->carts->load(['product.images', 'product.variants', 'variant']) as $cart)
                        <div wire:key="{{ $cart->id }}" class="divide-y divide-gray-100 mb-4 pb-4">
                            <div class="hover:border-b p-2 rounded">


                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <img src="{{ asset($cart->product->images->first()->file_path) }}"
                                             alt="تصویر محصول"
                                             class="w-16 h-16 rounded object-cover mr-4 shadow-sm">
                                        <h3 class="text-xs font-medium text-gray-800">
                                            {{ $cart->product->name }}
                                            <span class="text-xs text-gray-600"> ({{ $cart->variant->type }}) </span>
                                            <span class="text-xs text-gray-600"> ({{ $cart->variant->weight }}) </span>
                                        </h3>


                                    </div>
                                </div>

                                <div class="flex items-center justify-between mt-2">

                                    <p class="text-lg font-bold text-gray-600 flex-grow">
                                        {{ number_format($cart->variant->price * $cart->quantity) }}
                                    </p>

                                    <div class="flex items-center gap-2">
                                        <x-button spinner
                                                  icon="o-plus"
                                                  class="btn-xs"
                                                  wire:click="increaseQty({{ $cart->id}})"
                                        />
                                        <span class="text-sm font-extrabold mx-1 border-b">{{ $cart->quantity }}</span>
                                        <x-button
                                            spinner
                                            icon="o-minus"
                                            class="btn-xs"
                                            wire:click="decreaseQty({{ $cart->id }})"
                                        />
                                    </div>

                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>

            </div>

            <div class="absolute bottom-0 left-0 w-full bg-violet-700 text-white text-center p-4">


                <div class="flex justify-between items-center text-sm mb-4 mt-2">
                    <span> مبلغ سفارش</span>
                    <span class="font-normal text-lg">{{ number_format($cartCost) }} </span>

                </div>

{{--                <div class="flex justify-between items-center text-sm mb-2">--}}
{{--                    <span>هزینه ارسال:</span>--}}
{{--                    <span class="font-thin">{{ number_format($shippingCost) }} </span>--}}
{{--                </div>--}}


{{--                <div class="flex justify-between items-center text-sm mb-2">--}}
{{--                    <span>جمع کل:</span>--}}
{{--                    <span class="font-normal">{{ number_format($totalCost) }} تومان</span>--}}
{{--                </div>--}}


                @if(Auth::user()->addresses()->count('id') > 0)
                    <x-button
                        spinner="payment"
                        wire:click.debounce.250ms="registerOrder"

                        label="ثبت سفارش"
                        icon="o-shopping-bag"
                        class="text-white bg-violet-800 hover:bg-violet-900 w-full py-2 rounded-md shadow-md text-sm font-medium"/>

                @else

                    <x-button
                        spinner="payment"
                        wire:click="regAddress"

                        label="ثبت سفارش"
                        icon="o-shopping-bag"
                        class="text-white bg-violet-800 hover:bg-violet-900 w-full py-2 rounded-md shadow-md text-sm font-medium"/>

                @endif


            </div>

        </x-drawer>
    @endif

</div>
