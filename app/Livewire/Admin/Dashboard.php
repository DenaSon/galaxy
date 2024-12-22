<?php

namespace App\Livewire\Admin;


use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
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
    public $bestProduct;

    public $conversionRate = 0;


    public function overview()
    {
        $this->usersCount = User::count('id');
        $this->ordersCount = Order::where('payment_status', 'paid')->count('id');
        $this->ordersSum = Order::where('payment_status','paid')->sum('grand_total');
        $this->orderItemsCount = OrderItem::whereHas('order', function ($query) {
            $query->where('payment_status', 'paid');
        })->count('id');


        $productWithMostOrders = OrderItem::select('product_id')
            ->selectRaw('COUNT(*) as purchase_count')
            ->groupBy('product_id')
            ->orderByDesc('purchase_count')
            ->first();
        $this->bestProduct = Product::find($productWithMostOrders?->product_id);


        $this->conversionRate = $this->calcConversionRate();


    }

    private function calcConversionRate(): float
    {
        $views = Product::sum('views') ?? 0;
        $orders = $this->ordersCount ?? 0;

        if ($views === 0) {
            return 0;
        }

        $rate = ($orders / $views) * 100;
        return (float) $rate;
    }


    public function clearCart()
    {
        $orderIds = Order::where('payment_status', 'pending')
            ->where('created_at', '<', Carbon::now()->subMinutes(1))
            ->pluck('id');

        if ($orderIds->isEmpty()) {
            return;
        }


        DB::table('order_items')->whereIn('order_id', $orderIds)->delete();

        Order::whereIn('id', $orderIds)->delete();
        Cache::flush();


    }


    public function render()
    {

        return view('livewire.admin.dashboard')->layout('components.layouts.admin');
    }
}
