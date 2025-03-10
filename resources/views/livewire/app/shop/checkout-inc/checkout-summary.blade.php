
<div class="flex justify-center items-center">
    <div
        class="bg-white w-full max-w-md shadow-xl group-hover:border-gray-700 rounded-lg p-4 border border-gray-200 transition-transform transform hover:scale-105 hover:shadow-2xl relative overflow-hidden">
        <!-- Header -->
        <div class="flex  mb-6  justify-center items-center">
            <div class="text-green-600 text-2xl mr-2 mt-2">
                <x-icon name="o-shopping-cart" class="text-lg font-bold" label="خلاصه سفارش"/>
            </div>

        </div>
        <hr class="mb-3">
        <!-- Product List -->
        <div class="space-y-4">
            <div class="flex justify-between text-gray-700">
                <span>هزینه سفارش</span>
                <span>{{ number_format($cartTotalCost ?? 0) }}</span>
            </div>
            <div class="flex justify-between text-gray-700">
                <span>تعداد محصولات</span>
                <span>{{ $totalItems }} </span>
            </div>
            <div class="flex justify-between text-gray-700">
                <span>وزن کل</span>
                <span>
        @php
            $weightInKg = $totalWeight / 1000;
        @endphp

                    @if($totalWeight < 1000)
                        {{ $totalWeight }} <span class="text-xs">گرم</span>
                    @else
                        @if(floor($weightInKg) == $weightInKg)
                            {{ floor($weightInKg) }} <span class="text-xs">کیلوگرم</span>
                        @else
                            {{ number_format($weightInKg, 3) }} <span class="text-xs">کیلوگرم</span>
                        @endif
                    @endif
    </span>
            </div>


            <div class="flex justify-between text-gray-700">
                <span>هزینه ارسال</span>
                <span>
                @if($shippingCost == 0)
                      <b>رایگان</b>
                    @else
                        {{ number_format($shippingCost) }}
                @endif
                </span>

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
                bg-primary text-white py-3 rounded-lg text-lg font-semibold shadow-md hover:bg-green-600 focus:ring-4 focus:ring-green-300">

        </x-button>


        <x-alert title="توجه" description="لطفا قبل از پرداخت فیلتر/شکن خود را خاموش کنید" icon="o-shield-exclamation" dismissible class="mt-3 text-primary" />



    </div>


</div>
