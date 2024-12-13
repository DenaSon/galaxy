<?php

namespace App\Livewire\Admin\Shop\Cart;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;

#[Layout('components.layouts.app')]
class SalesChart extends Component
{
    use Toast;
    public $salesChart = [];


    private function getSalesData()
    {
        $ordersPerDay = \DB::table('orders')
            ->selectRaw('DATE(created_at) as date, COUNT(*) as order_count')
            ->groupBy('date')
            ->orderBy('date')
            ->get();
        $labels = $ordersPerDay->pluck('date')->toArray();
        $orderCounts = $ordersPerDay->pluck('order_count')->toArray();


        return [
            'type' => 'line',
            'data' => [
                'labels' => $labels, // Dates as labels
                'datasets' => [
                    [
                        'label' => 'Orders per day',
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
