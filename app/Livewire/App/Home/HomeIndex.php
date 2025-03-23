<?php

namespace App\Livewire\App\Home;

use App\Models\Product;
use Corcel\Model\Post;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;
use Throwable;

#[Layout('components.layouts.app')]
class HomeIndex extends Component
{
    use Toast;

    public $price = 0;



    public $showDrawer = false;

    public function mount()
    {

    }


    public function render()
    {
        $websiteTitle = getSetting('website_title');


        $specialProduct = Product::where('is_active', '=', 1)
            ->where('id', 18)
            ->with(['variants', 'images'])
            ->first();


        $products = cache()->remember('home_products', now()->addHours(12), function () {
            return Product::where('is_active', '=', 1)
                ->latest()
                ->take(23)
                ->with(['variants', 'images'])
                ->get();
        });


        if ($specialProduct) {
            $products->prepend($specialProduct);
        }

        // Get Blogs

        $blogs = Post::where('post_status', 'publish')->get();



        return view('livewire.app.home.home-index', compact('products'))->with(['blogs' => $blogs])
            ->title($websiteTitle ?? 'Home');
    }


}
