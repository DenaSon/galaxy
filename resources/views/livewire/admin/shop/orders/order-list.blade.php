<div>
    @livewire('admin.shop.orders.order-overview')
    <x-menu-separator/>


    <div>
        <div class="flex flex-col md:flex-row md:space-x-4">

            <div class="w-full md:w-full shadow-lg m-2">
                @php
                    $headers = [
                        ['key' => 'id', 'label' => '#'],
                        ['key' => 'username', 'label' => 'کاربر'],
                        ['key' => 'order_number', 'label' => 'شماره سفارش'],
                        ['key' => 'created_at', 'label' => 'زمان'],
                        ['key' => 'views', 'label' => 'بازدید'],
                        ['key' => 'actions', 'label' => 'اقدامات']
                    ];
                @endphp

                <x-table :headers="$headers" :rows="$order" selectable="true" striped="true"
                         empty-text="موردی وجود ندارد" with-pagination>


                    @scope('cell_id', $order)
                    <strong>{{ $loop->iteration }}</strong>
                    @endscope


                    @scope('cell_username', $order)
                    {{ $order->user->first_name }} {{ $order->user->last_name }}
                    @endscope
                    @scope('cell_order_number', $order)
                    {{ $order->order_number }}
                    @endscope

                    @scope('cell_order_number', $order)
                    {{ $order->order_number }}
                    @endscope


                    @scope('cell_created_at', $order)
                    {{ jdate($order->created_at)->toFormattedDateString() }}
                    <small> ساعت :{{ jdate($order->created_at)->format('H:m') }}</small>
                    @endscope


                </x-table>


            </div>


        </div>
    </div>


</div>
