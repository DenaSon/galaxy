<?php

namespace App\Livewire\App\Shop\Chart;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Carbon;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;

#[Layout('components.layouts.app')]
class ViewsChart extends Component
{
    use Toast;


    public $ordersChart =[];


    public function getOrdersChart()
    {
        return [
            'labels' => ['امروز', 'دیروز', 'پریروز'],
            'data' => [50, 58, 65],
        ];
    }

    public function mount()
    {
       $this->ordersChart =  $this->getOrdersChart();
    }

    public function render()
    {
        return view('livewire.app.shop.chart.views-chart');

    }
}
