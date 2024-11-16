<?php

namespace App\Livewire\App\Home;
use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;
#[Layout('components.layouts.app')]

class HomeIndex extends Component
{
    use Toast;
    public $showDrawer = false;

    public function mount()
    {

    }

    public function render()
    {
        $products = cache()->remember('home_products', now()->addHours(12), function () {
            return Product::active()
                ->latest()
                ->take(9)
                ->with(['variants', 'images'])
                ->get();
        });

        return view('livewire.app.home.home-index', compact('products'))
            ->title('دنا');
    }
}
