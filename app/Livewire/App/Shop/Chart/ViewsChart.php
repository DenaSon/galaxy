<?php

namespace App\Livewire\App\Shop\Chart;

use App\Models\Product;
use Illuminate\Support\Carbon;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;

#[Layout('components.layouts.app')]
class ViewsChart extends Component
{
    use Toast;


    public $viewsChart;


    public function loadViewsChart()
    {
        $viewsData = $this->getViewsData();

        $this->viewsChart = [
            'type' => 'bar',
            'data' => [
                'labels' => $viewsData['labels'],
                'datasets' => [
                    [
                        'label' => 'تعداد بازدیدها',
                        'data' => $viewsData['data'],
                        'backgroundColor' => ['#FF6384', '#36A2EB', '#FFCE56'],
                    ],
                ],
            ],
            'options' => [
                'responsive' => true,
            ],
        ];
    }

    public function mount()
    {
        $this->loadViewsChart();
    }

    public function getViewsData()
    {

        $todayViews = Product::whereDate('created_at', Carbon::today())->sum('views');

        $yesterdayViews = Product::whereBetween('updated_at', [
            Carbon::yesterday()->startOfDay(),
            Carbon::yesterday()->endOfDay(),
        ])->sum('views');

        $twoDaysAgoViews = Product::whereBetween('updated_at', [
            Carbon::yesterday()->subDay()->startOfDay(),
            Carbon::yesterday()->subDay()->endOfDay(),
        ])->sum('views');

        return [
            'labels' => ['امروز', 'دیروز', 'پریروز'],
            'data' => [$todayViews, $yesterdayViews, $twoDaysAgoViews],
        ];

    }


    public function render()
    {
        return view('livewire.app.shop.chart.views-chart')
            ->title('');
    }
}
