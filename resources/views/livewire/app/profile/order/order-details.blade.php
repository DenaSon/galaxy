<div>
    <div>
        <div class="container mx-auto lg:px-2 2xl:px-0 mt-2">

            <div class="flex flex-col lg:flex-row gap-4 mt-4">


                <div class="w-full lg:w-6/6 border rounded-lg p-6 bg-white shadow-md">
                    <div class="border-b pb-4 mb-4">



                        <div class="flex justify-between mt-2">
                            <h2 class="text-xl font-semibold text-gray-700">جزئیات سفارش</h2>
                           @if($order->payment_status == 'paid')
                               <x-badge class="badge-success text-white" value="پرداخت شده"/>
                           @endif
                        </div>
                        <!-- Order Number -->
                        <div class="flex justify-between mt-2">
                            <span class="text-sm text-gray-500">شماره سفارش:</span>
                            <span class="text-sm font-bold text-gray-700">#{{ $order->id }}</span>
                        </div>

                        <!-- Order Date -->
                        <div class="flex justify-between mt-2">
                            <span class="text-sm text-gray-500">تاریخ:</span>
                            <span class="text-sm font-bold text-gray-700">{{ jdate($order->created_at)->toDateString() }}</span>
                        </div>


                        <div class="flex justify-between mt-2">
                            <span class="text-sm text-gray-500">هزینه ارسال:</span>
                            <span class="text-sm font-thin text-gray-700">{{ number_format($order->shipping_cost) }} تومان</span>
                        </div>


                        <div class="flex justify-between mt-2">

                            <span class="text-sm text-gray-500">آدرس:</span>
                            <span class="text-xs font-thin text-gray-700 sm:text-sm">{{ $order->shipping_address }}</span>
                        </div>




                    </div>




                    <!-- Order Items -->
                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-gray-600">آیتم‌های سفارش</h3>
                        <div class="mt-4">


                            @foreach($order->orderItems as $item)
                            <div class="flex items-center justify-between border-b py-3">
                                <div class="flex items-center">
                                    <img src="{{ asset($item->product->images()->first()->file_path ?? noPictureUrl()) }}" alt="Product Image" class="w-12 h-12 rounded-md mr-4">
                                    <div>
                                        <p class="text-xs font-medium text-gray-700 sm:text-sm">{{ $item->title }}</p>
                                        <p class="text-xs text-gray-500"> تعداد:  {{ $item->quantity }} </p>
                                    </div>
                                </div>
                                <div class="text-sm  text-gray-700  font-bold"> {{ number_format($item->price) }}

                                </div>

                            </div>
                            @endforeach



                        </div>
                    </div>

                    <!-- Total Amount -->
                    <div class="border-t pt-4">
                        <div class="flex items-center justify-between">
                            <p class="text-lg font-medium text-gray-700">مجموع</p>
                            <p class="text-lg font-semibold text-gray-900"> {{ number_format($order->grand_total) }} تومان</p>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

</div>
