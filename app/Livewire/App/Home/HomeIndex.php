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

    public $blogs = [];


    public $showDrawer = false;

    public function mount()
    {
        try {
            if (config('wordpress.wp_enable')) {

                $this->blogs = Post::all(['post_status' => 'publish']);

            } else {
                $this->blogs = collect();
            }


        } catch (Throwable $e) {
            $this->blogs = collect();

        }
    }

    public function blogList()
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


        if (config('wordpress.wp_enable')) {
            $posts = Post::all();
        } else {
            $posts = collect();
        }

        return view('livewire.app.home.home-index', compact('products', 'posts'))
            ->title($websiteTitle ?? 'Home');
    }


}
