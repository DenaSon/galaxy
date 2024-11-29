<?php

namespace App\Livewire\Admin;


use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Support\Carbon;
use Livewire\Attributes\Title;
use Livewire\Component;
use Mary\Traits\Toast;

#[Title('داشبورد')]
class Dashboard extends Component
{
    use Toast;

    public $usersCount;
    public $ordersCount;
    public $ordersSum;
    public $orderItemsCount;


    public function overview()
    {
        $this->usersCount = User::count('id');
        $this->ordersCount = Order::where('payment_status', 'paid')->count('id');
        $this->ordersSum = Order::where('payment_status','paid')->sum('grand_total');
        $this->orderItemsCount = OrderItem::whereHas('order', function ($query) {
            $query->where('payment_status', 'paid');
        })->count('id');
    }

    public function clearCart()
    {
        $orders = Order::where('payment_status','pending')->where('created_at', '<', Carbon::now()->subHours(2))->get();

        foreach ($orders as $order)
        {
            $order->orderItems()->delete();

            $order->delete();

        }
    }


    public function render()
    {

        return view('livewire.admin.dashboard')->layout('components.layouts.admin');
    }
}
