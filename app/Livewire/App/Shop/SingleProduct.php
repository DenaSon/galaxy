<?php

namespace App\Livewire\App\Shop;

use App\Models\Product;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;

#[Layout('components.layouts.app')]
class SingleProduct extends Component
{
    use Toast;

    public $title;
    public Product $product;

    public function mount()
    {

        $this->incrementView($this->product);
    }

    private function incrementView($product)
    {
        if (!session()->has('product_' . $product->id . '_viewed')) {

            $product->increment('views');


            session()->put('product_' . $product->id . '_viewed', true);
        }
    }



    public function render()
    {
        return view('livewire.app.shop.single-product')
            ->title('خرید'. ' '. $this->product->name );
    }
}
