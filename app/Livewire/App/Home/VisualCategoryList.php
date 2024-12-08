<?php

namespace App\Livewire\App\Home;
use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Lazy;
use Livewire\Component;
use Mary\Traits\Toast;
#[Layout('components.layouts.app')]

class VisualCategoryList extends Component
{
use Toast;

    public function mount()
    {

    }

    public function render()
    {
        $products = Product::inRandomOrder()->limit(12)->get();
        return view('livewire.app.home.visual-category-list',['products'=>$products]);

    }
}
