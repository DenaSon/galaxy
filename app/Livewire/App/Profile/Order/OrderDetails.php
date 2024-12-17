<?php

namespace App\Livewire\App\Profile\Order;

use App\Models\Order;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;

#[Layout('components.layouts.app')]
class OrderDetails extends Component
{
    use Toast;

    public $order;

    public function mount(Order $order)
    {
        $this->order = Order::where('id', $order->id)
            ->where('user_id', auth()->id())
            ->where('payment_status', 'paid')
            ->firstOrFail();
    }


    public function render()
    {
        return view('livewire.app.profile.order.order-details')
            ->title('جزئیات سفارش');
    }
}
