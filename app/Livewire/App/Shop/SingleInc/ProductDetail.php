<?php

namespace App\Livewire\App\Shop\SingleInc;
use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;
#[Layout('components.layouts.app')]

class ProductDetail extends Component
{
    use Toast;
    public Product $product;

    public function mount(Product $product)
    {
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.app.shop.single-inc.product-detail');

    }
}
