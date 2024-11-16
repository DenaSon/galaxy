<?php

namespace App\Livewire\App\Home;
use App\Models\Blog;
use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;
#[Layout('components.layouts.app')]

class HomeIndex extends Component
{
    use Toast;
    public $showDrawer = false;

    public function mount()
    {

    }

    public function render()
    {
        $websiteTitle = getSetting('website_title');
        $products = cache()->remember('home_products', now()->addHours(12), function () {
            return Product::active()
                ->latest()
                ->take(18)
                ->with(['variants', 'images'])
                ->get();
        });

        $blogs = cache()->remember('home_blogs', now()->addHours(24), function () {
            return Blog::active()
                ->latest()
                ->take(4)
                ->with(['categories', 'images'])
                ->get();
        });

        return view('livewire.app.home.home-index', compact('products','blogs'))
            ->title($websiteTitle ?? 'Home');
    }
}
