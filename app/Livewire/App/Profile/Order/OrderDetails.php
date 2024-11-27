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

    public function mount( Order $order )
    {

    }

    public function render()
    {
        return view('livewire.app.profile.order.order-details')
        ->title('جزئیات سفارش');
    }
}
