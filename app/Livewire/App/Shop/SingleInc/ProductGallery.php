<?php

namespace App\Livewire\App\Shop\SingleInc;
use App\Models\Product;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;
#[Layout('components.layouts.app')]

class ProductGallery extends Component
{
use Toast;
    public $images;
    public $product;

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->images = Cache::remember('slider-images-'.$product->id, now()->addMinutes(30), function () use ($product)
        {
           return $product->images->pluck('file_path')->toArray();
        });
    }

    public function render()
    {

        return view('livewire.app.shop.single-inc.product-gallery')
        ->title('');
    }
}
