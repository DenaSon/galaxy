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
    public $product;

    public function mount(Product $product)
    {
        $this->title = $product->name;
        $this->product = $product;
        $this->incrementView($product);
    }

    private function incrementView($product)
    {
        RateLimiter::attempt('product.' . $product->id . '.views', 1, function () use ($product) {

            $product->increment('views');
        },120);
    }

    public function seoTitle()
    {
        $preText = 'خرید ';
        $productName = $this->title;
        return $preText . $productName;
    }

    public function render()
    {
        return view('livewire.app.shop.single-product')
            ->title($this->seoTitle());
    }
}
