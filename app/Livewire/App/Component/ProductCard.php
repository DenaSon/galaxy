<?php

namespace App\Livewire\App\Component;
use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Lazy;
use Livewire\Component;
use Mary\Traits\Toast;
#[Layout('components.layouts.app')]

class ProductCard extends Component
{
use Toast;
    public Product $product;

    public function addFavorite(Product $product)
    {
        if (!auth()->check()) {

        }
        else
        {
            $this->warning('ورود به حساب کاربری',
                'برای افزودن به لیست علاقه مندی وارد حساب کاربری خود شوید',
                'bottom-center',
                'o-heart',
                'bg-blue-500 text-base-100'
            );


        }
    }

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
