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
    public $ranking = 4;
    public $selectedTab =   'productFeature';

    public $rating = 0;



    public function mount(Product $product)
    {
        if($product->related_article_id != null)
        {
            $this->selectedTab = 'relatedBlog';
        }
        else
        {
            $this->selectedTab = 'productFeature';
        }
    }


    public function render()
    {

        return view('livewire.app.shop.single-inc.product-detail');

    }
}
