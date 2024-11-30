<?php

namespace App\Livewire\Admin\Shop;
use App\Models\Product;
use App\Models\Variant;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;
#[Layout('components.layouts.admin')]

class PriceManagement extends Component
{
use Toast;
    public $selectedProduct;

    public $variants;



    public function mount()
    {

    }


    public function updatedSelectedProduct($value)
    {
        $this->variants = Variant::where('product_id', $value)->get();
    }

    public function render()
    {
        $product_list = Product::get();
        return view('livewire.admin.shop.price-management')->with('product_list', $product_list)
        ->title('مدیریت قیمت ها');
    }
}
