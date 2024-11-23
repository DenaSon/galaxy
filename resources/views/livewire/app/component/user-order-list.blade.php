@php

    $headers = [

        ['key' => 'id', 'label' => 'شماره سفارش'],
        ['key' => 'grand_total', 'label' => 'مبلغ پرداختی'],
        ['key' => 'status', 'label' => 'وضعیت'],


        ];
@endphp


<x-card subtitle="سفارش‌ها" class="border-none">
    <x-table class="border-none" with-pagination :headers="$headers" :rows="$order" link="order-{order_number}"
             empty-text="هنوز سفارشی ثبت نکرده‌اید">
        @scope('cell_id', $order)
        <strong>{{ $order->order_number }}</strong>
        @endscope


        @scope('cell_grand_total', $order)
        {{ number_format($order->grand_total) }}
        @endscope

        @scope('cell_status', $order)
        @if($order->status == 'preparing')
            <span class="text-xs badge bg-warning text-white"> آماده‌سازی</span>
        @elseif($order->status == 'shipped')
            <span class="text-xs badge bg-info text-white">ارسال </span>
        @elseif($order->status == 'delivered')
            <span class="text-xs badge bg-success text-white">تحویل </span>
        @elseif($order->status == 'cancelled')
            <span class="text-xs badge bg-error text-white"> لغو </span>
        @else
            <span class="text-xs badge bg-secondary text-white">نامشخص</span>
        @endif
        @endscope


        @scope('cell_created_at', $order)
        <span class="tooltip text-xs"
              data-tip=" {{ jdate($order->created_at)->toTimeString() }}">  {{ jdate($order->created_at)->toDateString() }} </span>
        @endscope


    </x-table>
</x-card>


