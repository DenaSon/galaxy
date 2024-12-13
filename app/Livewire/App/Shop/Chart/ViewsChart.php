<?php

namespace App\Livewire\App\Shop\Chart;
use App\Models\Product;
use Illuminate\Support\Arr;
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


        $yesterdayViews = Product::whereDate('created_at', Carbon::yesterday())->sum('views');


        $lastWeekViews = Product::whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])->sum('views');

        return [
            'labels' => ['امروز', 'دیروز', 'هفته گذشته'],
            'data' => [$todayViews, $yesterdayViews, $lastWeekViews],
        ];
    }





    public function render()
    {
        return view('livewire.app.shop.chart.views-chart')
        ->title('');
    }
}
