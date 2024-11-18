<?php

namespace App\Livewire\App\Shop\SingleInc;
use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Lazy;
use Livewire\Component;
use Mary\Traits\Toast;
#[Layout('components.layouts.app')]

class ProductDetail extends Component
{
    use Toast;
    public Product $product;
    public $ranking = 4;
    public $selectedTab = 'productFeature';

    public $features = [];
    public $rating = 0;

    public $comment_list = [];

    public function mount(Product $product)
    {
        $this->product = $product;



    }


    public function loadAttributes()
    {
        $this->features = $this->product->attributes;
    }

    public function loadComments()
    {

        $comments = $this->product->comments()->whereStatus('published')->latest()->take(30)->get();


        foreach ($comments as $comment) {

            $this->rating = $comment->rating;
        }

        $this->comment_list = $comments;
    }

    public function render()
    {

        return view('livewire.app.shop.single-inc.product-detail');

    }
}
