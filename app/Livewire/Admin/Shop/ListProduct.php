<?php

namespace App\Livewire\Admin\Shop;
use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;
use Livewire\Component;
use Mary\Traits\Toast;

#[Title('لیست محصولات')]

#[Layout('components.layouts.admin')]
#[Lazy]

class ListProduct extends Component
{

    use  Toast;

    public array $sortBy = ['column' => 'views', 'direction' => 'asc' ];


    public function deActiveProduct(Product $product)
    {
        $product->update(['is_active' => false,'stop_selling' => now()]);
        $this->error('محصول غیرفعال شد');
    }

    public function ActiveProduct(Product $product)
    {
        $product->update(['is_active' => true,'stop_selling' => null]);
        $this->success('محصول فعالسازی شد');
    }

    public function editProduct(Product $product)
    {
        $this->redirect(route('master.shop.create',['edit'=>$product]));
    }


    public function render()
    {
        $product = Product::latest('created_at')  ->orderBy(...array_values($this->sortBy))->paginate(20);
        return view('livewire.admin.shop.list-product',compact('product'))
        ->title('');
    }
}
