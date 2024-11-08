<?php

namespace App\Livewire\Admin\Shop\Inc;

use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Layout('components.layouts.admin')]

class CreateProductOverview extends Component
{

    public $activeProductsCount;
    public $totalProductsCount;
    public $totalCommentsCount;

    public $viewsCount;


    public function mount()
    {
        $this->activeProductsCount = Product::query()->active()->count('id');
        $this->totalProductsCount = Product::count('id');
        $this->totalCommentsCount = Product::withCount('comments')->get()->sum('comments_count');
        $this->viewsCount = Product::sum('views');

    }




    public function render()
    {
        return view('livewire.admin.shop.inc.create-product-overview');

    }
}
