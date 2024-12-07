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
        $this->blogs = [];
    }


    public function blogList()
    {
        $response = Http::get('http://your-wordpress-site.com/wp-json/wp/v2/posts');
        if ($response->successful())
        {
            $this->blogs = $response->json();

        }
        else
        {
            $this->blogs = [];
        }
        $this->blogs = $this->blogs ?? [];
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
