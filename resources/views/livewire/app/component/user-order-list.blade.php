@php

    $headers = [

        ['key' => 'id', 'label' => 'شماره سفارش'],
         ['key' => 'payment_transaction_id', 'label' => 'شماره پیگیری'],
        ['key' => 'grand_total', 'label' => 'مبلغ '],
        ['key' => 'status', 'label' => 'وضعیت'],
        ['key' => 'action', 'label' => 'مشاهده'],

        ];
@endphp


<x-card subtitle="سفارش‌ها" class="border-none">
    <x-table class="border-none"  :headers="$headers" :rows="$orders"

             empty-text="هنوز سفارشی ثبت نکرده‌اید">
        @scope('cell_id', $order)
        <a wire:navigate href="{{ route('panel.orderDetails',['order' => $order->id]) }}">
        <strong wire:key="{{ $order->id }}">{{ $order->id }}</strong>
        </a>
        @endscope

        @scope('cell_payment_transaction_id', $order)
        {{ $order->payment_transaction_id ?? 'N/A' }}
        @endscope


        @scope('cell_grand_total', $order)
        {{ number_format($order?->grand_total) }}
        @endscope

        @scope('cell_status', $order)
        @if($order->status == 'preparing')
            <span class="text-xs badge bg-warning border-success text-white"> آماده‌سازی</span>
        @elseif($order->status == 'shipped')
            <span class="text-xs badge bg-info text-white">ارسال </span>
        @elseif($order->status == 'delivered')
            <span class="text-xs badge bg-success text-white">تحویل </span>
        @elseif($order->status == 'cancelled')
            <span class="text-xs badge bg-error text-white"> لغو </span>
        @elseif($order->status == 'pending')
            <span class="text-xs badge bg-orange-400 text-white"> انتظار پرداخت </span>
        @else
            <span class="text-xs badge bg-secondary text-white">نامشخص</span>
        @endif
        @endscope


        @scope('cell_created_at', $order)
        <span class="tooltip text-xs"
              data-tip=" {{ jdate($order->created_at)->toTimeString() }}">  {{ jdate($order->created_at)->toDateString() }} </span>
        @endscope

        @scope('cell_action', $order)

        <a wire:navigate href="{{ route('panel.orderDetails',['order' => $order->id]) }}">
            <x-icon name="o-eye"></x-icon>
        </a>

        @endscope


    </x-table>

    {{ $orders->links() }}



</x-card>


