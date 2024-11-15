<?php

namespace App\Livewire\Admin\Shop\Orders;

use App\Models\Order;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;
use Morilog\Jalali\Jalalian;

#[Layout('components.layouts.admin')]
class OrderOverview extends Component
{
    use Toast;
    public $totalCount;
    public $totalPayment;
    public $todayPayment;
    public $weekPayment;

    public function mount()
    {
        $this->totalCount = Order::active()->count();
        $this->totalPayment = Order::active()->sum('grand_total');

        $todayStart = Jalalian::now()->toCarbon()->startOfDay();
        $todayEnd = Jalalian::now()->toCarbon()->endOfDay();

        $this->todayPayment = Order::active()->whereBetween('created_at', [$todayStart, $todayEnd])->sum('grand_total');

        $weekStart = Jalalian::now()->subDays(7)->toCarbon();

        $this->weekPayment = Order::active()->whereBetween('created_at', [$weekStart, $todayEnd])->sum('grand_total');


    }


    public function render()
    {
        return view('livewire.admin.shop.orders.order-overview');

    }
}
