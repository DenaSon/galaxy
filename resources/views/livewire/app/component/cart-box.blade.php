<div>

    @if(Auth::check() && Auth::user()->carts->isNotEmpty())
        <x-drawer wire:model="cartBox" class="w-11/12 lg:w-1/4 relative p-0 py-0 m-0" left>


            <div class="mt-0 pb-10  px-2">
                <div class="bg-white rounded overflow-y-auto max-h-[80vh] p-4">

                    <h2 class="text-sm font-bold text-center pb-2">سبد خرید</h2>
                    <hr>
                    <div class="relative">
                        <x-progress wire:loading value="10" max="100"
                                    class="progress-warning h-1 bg-white absolute top-0 left-0 w-full" indeterminate/>
                    </div>

                    @foreach(Auth::user()->carts->load(['product.images', 'product.variants', 'variant']) as $cart)
                        <div wire:key="{{ $cart->id }}" class="divide-y divide-gray-100 mb-4 pb-4">
                            <!-- المان والد با group -->
                            <div class="hover:bg-primary hover:text-white p-2 rounded transition duration-300 group">
                                <!-- بخش بالای کارت -->
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <img
                                            src="{{ asset($cart->product->images->first()->file_path) }}"
                                            alt="تصویر محصول"
                                            class="w-16 h-16 rounded object-cover mr-4 shadow-sm"
                                        >
                                        <h3 class="text-xs font-medium">
                                            {{ $cart->product->name }}
                                            <b class="text-xs"> ({{ $cart->variant->type }}) </b>
                                        </h3>
                                    </div>
                                </div>

                                <!-- بخش پایینی کارت -->
                                <div class="flex items-center justify-between mt-2">
                                    <p class="text-lg font-bold flex-grow">
                                        {{ number_format($cart->variant->price * $cart->quantity) }}
                                    </p>

                                    <div class="flex items-center gap-2">
                                        <!-- دکمه‌ها -->
                                        <x-button
                                            spinner
                                            icon="o-plus"
                                            class="btn-sm btn-outline border-primary group-hover:bg-white group-hover:text-primary"
                                            wire:click="increaseQty({{ $cart->id }})"
                                        />
                                            <span
                                              class="text-sm font-extrabold mx-1 border border-gray-200 rounded-full px-3 py-1 bg-gray-50 text-gray-800 shadow-sm">
                                            {{ $cart->quantity }}
                                           </span>

                                        <x-button
                                            spinner
                                            icon="o-minus"
                                            class="btn-sm btn-outline border-primary group-hover:bg-white group-hover:text-primary"
                                            wire:click="decreaseQty({{ $cart->id }})"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>

            </div>

            <div class="absolute bottom-0 left-0 w-full bg-primary text-white text-center p-6 rounded-tl-lg rounded-tr-lg shadow-lg">
                <!-- Order Total -->
                <div class="flex justify-between items-center text-sm mb-4 mt-2">
                    <span>مبلغ سفارش</span>
                    <span class="font-semibold text-xl">{{ number_format($cartCost) }} </span>
                </div>

                <!-- Shipping Cost (Uncomment if needed) -->
                {{-- <div class="flex justify-between items-center text-sm mb-4">
                    <span>هزینه ارسال:</span>
                    <span class="font-thin">{{ number_format($shippingCost) }}</span>
                </div> --}}

                <!-- Total Cost -->
                {{-- <div class="flex justify-between items-center text-sm mb-4">
                    <span>جمع کل:</span>
                    <span class="font-semibold text-lg">{{ number_format($totalCost) }} تومان</span>
                </div> --}}

                <!-- Order Button -->
                @if(Auth::user()->addresses()->count('id') > 0)
                    <x-button
                        spinner="payment"
                        wire:click.debounce.250ms="registerOrder"
                        label="ثبت سفارش"
                        icon="o-shopping-bag"
                        class="text-white bg-primary hover:bg-violet-400 focus:outline-none focus:ring-2 focus:ring-primary w-full py-3 rounded-md shadow-md text-sm font-medium transition-colors duration-200"
                        aria-label="ثبت سفارش - خرید سبد خرید" />
                @else
                    <x-button
                        spinner="payment"
                        wire:click="regAddress"
                        label="ثبت سفارش"
                        icon="o-shopping-bag"
                        class="text-white bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary-dark w-full py-3 rounded-md shadow-md text-sm font-medium transition-colors duration-200"
                        aria-label="ثبت سفارش - نیاز به آدرس" />
                @endif
            </div>


        </x-drawer>
    @endif

</div>
