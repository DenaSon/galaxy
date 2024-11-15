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

    public function mount()
    {

    }

    public function render()
    {
        $products = Product::take(9)->get();

        return view('livewire.app.home.home-index', compact('products'))
        ->title('دنا');
    }
}
