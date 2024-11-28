<?php

namespace App\Livewire\Admin\Shop\Orders;
use App\Models\Order;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;
#[Layout('components.layouts.admin')]

class OrderDetail extends Component
{
use Toast;

public Order $order;

    public function mount(Order $order)
    {

    }

    public function render()
    {
        return view('livewire.admin.shop.orders.order-detail')
        ->title('جزئیات سفارش');
    }
}
