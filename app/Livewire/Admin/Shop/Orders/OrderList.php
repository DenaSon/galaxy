<?php

namespace App\Livewire\Admin\Shop\Orders;
use App\Models\Order;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Mary\Traits\Toast;
#[Title('سفارش ها')]
#[Layout('components.layouts.admin')]

class OrderList extends Component
{
    use Toast;


    public function save()
    {


    }

    public function mount()
    {

    }


    public function render()
    {
        $order = \Auth::user()->orders()->latest()->paginate(20);
        return view('livewire.admin.shop.orders.order-list', compact('order'))
        ->title('لیست سفارش ها');
    }
}
