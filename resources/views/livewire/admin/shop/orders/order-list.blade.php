<div>
    @livewire('admin.shop.orders.order-overview')
    <x-menu-separator/>

    <div>
        <div class="flex flex-col md:flex-row md:space-x-4">

            <div class="w-full md:w-full shadow-lg m-2">
                @php
                    $headers = [
                        ['key' => 'id', 'label' => '#'],
                        ['key' => 'order_number', 'label' => 'شماره سفارش'],
                        ['key' => 'username', 'label' => 'کاربر'],
                         ['key' => 'created_at', 'label' => 'زمان'],
                        ['key' => 'grand_total', 'label' => 'مبلغ کل'],
                        ['key' => 'status', 'label' => 'وضعیت'],

                    ];
                @endphp

                <x-table :headers="$headers" :rows="$order"  striped="true"
                         empty-text="موردی وجود ندارد" with-pagination>


                    @scope('cell_id', $order)
                    <strong>{{ $loop->iteration }}</strong>
                    @endscope

                    @scope('cell_username', $order)
                    {{ $order?->user?->first_name }} {{ $order?->user?->last_name }}
                    @endscope


                    @scope('cell_order_number', $order)
                    <a href="{{ route('master.shop.orderDetail',['order'=>$order->id]) }}"
                       wire:navigate>{{ $order->id }} </a>
                    @endscope

                    @scope('cell_created_at', $order)
                    <span title="{{ jdate($order->created_at)->ago() }}" class="
                    @if(jdate($order->created_at)->isToday())   @endif
                    "> {{ jdate($order->created_at)->toFormattedDateString() }}</span>
                    @endscope

                    @scope('cell_grand_total', $order)
                    <b class="font-bold">{{ number_format($order->grand_total) }}</b>
                    @endscope



                </x-table>


            </div>


        </div>
    </div>


</div>
