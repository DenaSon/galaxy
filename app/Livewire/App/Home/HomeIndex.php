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
        $response = Http::get('https://denapax.com/blogpress/wp-json/wp/v2/posts');
        if ($response->successful()) {

            $this->blogs = $response->json();

            foreach ($this->blogs as &$blog) {
                if (isset($blog['featured_media']) && $blog['featured_media']) {
                    // Fetch the featured image details
                    $mediaResponse = Http::get('https://denapax.com/blogpress/wp-json/wp/v2/media/' . $blog['featured_media']);
                    if ($mediaResponse->successful()) {
                        $media = $mediaResponse->json();
                        // Get the image URL from the media data
                        $blog['featured_image_url'] = $media['source_url']; // Featured image URL
                    }
                }

            }
        }
    }



    public function blogList()
    {


    }


    public function render()
    {
        $websiteTitle = getSetting('website_title');
        $products = cache()->remember('home_products', now()->addHours(12), function () {
            return Product::active()
                ->latest()
                ->take(24)
                ->with(['variants', 'images'])
                ->get();
        });


        return view('livewire.app.home.home-index', compact('products'))
            ->title($websiteTitle ?? 'Home');
    }
}
