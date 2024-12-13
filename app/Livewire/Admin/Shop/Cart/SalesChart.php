<?php

namespace App\Livewire\Admin\Shop\Cart;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;
use Morilog\Jalali\Jalalian;

#[Layout('components.layouts.app')]
class SalesChart extends Component
{
    use Toast;
    public $salesChart = [];


    private function getSalesData()
    {
        $ordersPerDay = \DB::table('orders')
            ->selectRaw('DATE(created_at) as date, COUNT(*) as order_count')
            ->where('payment_status', 'paid')
            ->groupBy('date')
            ->orderBy('date')
            ->get();
        $labels = $ordersPerDay->pluck('date')->map(function ($date) {
            return jdate($date)->toDateString();
        })->toArray();
        $orderCounts = $ordersPerDay->pluck('order_count')->toArray();


        return [
            'type' => 'line',
            'data' => [
                'labels' => $labels, // Dates as labels
                'datasets' => [
                    [
                        'label' => 'نمودار سفارش ها',
                        'data' => $orderCounts,
                        'borderColor' => 'rgba(75,192,192,1)',
                        'backgroundColor' => 'rgba(75,192,192,0.2)',
                        'fill' => true,
                    ]
                ]
            ]
        ];


    }

    public function mount()
    {
        $this->salesChart = $this->getSalesData();
    }

    public function render()
    {
        return view('livewire.admin.shop.cart.sales-chart');

    }
}
