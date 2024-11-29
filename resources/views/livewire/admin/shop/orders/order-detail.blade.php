<div>

    <x-menu-separator/>

    <div>
        <div class="flex flex-col md:flex-row md:space-x-4">

            <div class="w-full md:w-full shadow-lg m-2">

                <div class="overflow-x-auto">
                    <table class="table">
                        <!-- head -->
                        <thead>
                        <tr>
                            <th>
                                <label>
                                   محصول
                                </label>
                            </th>
                            <th>تعداد</th>
                            <th>وزن</th>


                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order->orderItems as $item)
                            <tr>

                                <td>
                                    <div class="flex items-center gap-3">
                                        <div class="avatar">
                                            <div class="mask mask-squircle h-12 w-12">
                                                <img
                                                    src="{{ asset($item->product->images()->first()->file_path ?? noPictureUrl()) }}"
                                                    alt=""/>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="font-bold">{{ $item->title }}</div>

                                        </div>
                                    </div>
                                </td>
                                <td>
                                    {{ $item->quantity }}
                                    <br/>
                                    <span
                                        class="text-gray-500">{{ number_format($item->price * $item->quantity) }}</span>

                                </td>
                                <td>{{ $item->variant->weight }}</td>

                            </tr>
                        @endforeach
                        </tbody>


                    </table>


                    <x-card subtitle="جزئیات سفارش" separator="">

                        <div class="items-center mb-2">
                            <b> نام و نام خانوادگی : </b>
                            <span>{{ $order->user->first_name }} {{ $order->user->last_name }}</span>
                        </div>

                        <div class="items-center mb-2">
                            <b> شماره تلفن: </b>
                            <span>{{ $order->user->phone }}</span>
                        </div>

                        <div class="items-center mb-2">
                            <b> آدرس پستی : </b>
                            <span>{{ $order->shipping_address }}</span>
                        </div>

                        <div class="items-center mb-2">
                            <b> وزن کل : </b>
                            <span>{{ $order->weight }} گرم</span>
                        </div>

                        <hr/>

                        <div class="items-center mb-2">
                            <b> هزینه پستی </b>
                            <span>{{ number_format($order->shipping_cost) }}</span>
                        </div>
                        <hr/>
                        <div class="items-center mb-2">
                            <b> پرداخت کل </b>
                            <span class="font-bold text-lg">{{ number_format($order->grand_total) }} تومان</span>
                        </div>
                        <x-hr class="mb-2"/>
                        <h4> {{ jdate($order->created_at)->toDateTimeString() }}</h4>



                    </x-card>

                </div>


            </div>


        </div>
    </div>


</div>
