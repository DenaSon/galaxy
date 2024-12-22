<?php

namespace App\Livewire\App\Home;

use App\Models\Product;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;

#[Layout('components.layouts.app')]
class HomeIndex extends Component
{
    use Toast;

    public $blogs = [];


    public $showDrawer = false;

    public function mount()
    {

        $response = Http::get('https://denapax.com/blogpress/wp-json/wp/v2/posts?_embed&per_page=10&_fields=id,title,featured_media');
        if ($response->successful()) {
            $this->blogs = $response->json();

            foreach ($this->blogs as &$blog) {
                if (isset($blog['featured_media']) && $blog['featured_media']) {

                    $mediaResponse = Http::get('https://denapax.com/blogpress/wp-json/wp/v2/media/' . $blog['featured_media']);
                    if ($mediaResponse->successful()) {
                        $media = $mediaResponse->json();

                        $blog['featured_image_url'] = $media['source_url'];
                    } else {
                        $blog['featured_image_url'] = null;
                    }
                } else {
                    $blog['featured_image_url'] = null;
                }
            }
        } else {
            $this->blogs = [];
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

        return view('livewire.app.home.home-index', compact('products'))
            ->title($websiteTitle ?? 'Home');
    }

}
