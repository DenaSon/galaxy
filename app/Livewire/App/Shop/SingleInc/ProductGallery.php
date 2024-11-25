<?php

namespace App\Livewire\App\Shop\SingleInc;
use App\Models\Product;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Lazy;
use Livewire\Component;
use Mary\Traits\Toast;
#[Layout('components.layouts.app')]

class ProductGallery extends Component
{
use Toast;
    public $images;
    public Product $product;

    public function mount()
    {

        $this->images = Cache::remember('slider-images-'.$this->product->id, now()->addMinutes(30), function ()
        {
            return $this->product->images->pluck('file_path')->map(function ($filePath) {

                return asset($filePath);
            })->toArray();
        });
    }

    public function render()
    {

        return view('livewire.app.shop.single-inc.product-gallery');

    }
}
