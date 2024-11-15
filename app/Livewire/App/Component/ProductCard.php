<?php

namespace App\Livewire\App\Component;
use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;
#[Layout('components.layouts.app')]

class ProductCard extends Component
{
use Toast;
    public Product $product;

    public function mount($product)
    {
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.app.component.product-card')
        ->title('');
    }
}
