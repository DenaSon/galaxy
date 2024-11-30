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

    public $variants = [];
    public $weight;
    public $price;


    public function save($index)
    {

        $variant = Variant::find($this->variants[$index]['id']);

        if ($variant) {

            $variant->price = $this->variants[$index]['price'];
            $variant->weight = $this->variants[$index]['weight'];
            $variant->save();


            $this->warning('ذخیره', 'تغییرات ذخیره شد!');
        }
    }



    public function mount()
    {
       // $this->variants_array = Variant::all()->toArray();

    }


    public function updatedSelectedProduct($value)
    {
        $this->variants = Variant::where('product_id', $value)->get()->toArray();
    }

    public function render()
    {
        $product_list = Product::get();
        return view('livewire.admin.shop.price-management')->with('product_list', $product_list)
        ->title('مدیریت قیمت ها');
    }
}
