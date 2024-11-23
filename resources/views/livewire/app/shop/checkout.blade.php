<div>


    <div class="flex justify-center items-center">
        <div class="bg-white w-full max-w-md shadow-xl rounded-lg p-4 border border-gray-200 transition-transform transform hover:scale-105 hover:shadow-2xl relative overflow-hidden">
            <!-- Header -->
            <div class="flex  mb-6  justify-center items-center">
                <div class="text-orange-500 text-2xl mr-2 mt-2">
                    <x-icon name="o-shopping-cart" class="text-sm" label="خلاصه سفارش"/>
                </div>

            </div>
            <x-hr/>
            <!-- Product List -->
            <div class="space-y-4">
                <div class="flex justify-between text-gray-700">
                    <span>هزینه سفارش</span>
                    <span>{{ number_format($cartTotalCost) }}</span>
                </div>
                <div class="flex justify-between text-gray-700">
                    <span>تعداد محصولات</span>
                    <span>{{ $totalItems }}</span>
                </div>
                <div class="flex justify-between text-gray-700">
                    <span>هزینه ارسال</span>
                    <span>{{ number_format($shippingCost) }}  </span>

                </div>
            </div>



            <div class="flex justify-center mt-4 font-bold text-lg text-gray-800 tooltip tooltip-bottom"
                 data-tip="{{ \Illuminate\Support\Number::spell($total,'fa_IR') }} تومان">

                <div class="stats shadow-lg border-gray-200">
                    <div class="stat">
                        <div class="stat-figure text-primary">
                           <x-icon name="o-bolt" class=""/>
                        </div>
                        <div class="stat-title">جمع کل</div>
                        <div class="stat-value text-primary tooltip">{{ number_format($total) }}</div>
                        <div class="stat-desc text-xs font-thin">تومان</div>
                    </div>
                </div>

            </div>

            <x-button
                icon="o-bolt"
                wire:click.debounce.500ms="startPayment"
                spinner="startPayment"
                label="پرداخت"
                class="w-full mt-6
                bg-green-500 text-white py-3 rounded-lg text-lg font-semibold shadow-md hover:bg-green-600 focus:ring-4 focus:ring-green-300">

            </x-button>
        </div>
    </div>
</div>
