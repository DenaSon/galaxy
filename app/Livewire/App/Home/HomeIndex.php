<?php

namespace App\Livewire\App\Home;

use App\Models\Product;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
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

    public $services = [];


    public $showDrawer = false;

    public function mount()
    {
        try {

            $this->blogs = Cache::remember('blogs_cache', now()->addMinutes(60), function () {
                $response = Http::get('https://liftpal.ir/blogpress/wp-json/wp/v2/posts?_embed&per_page=10&_fields=id,title,featured_media');
                if ($response->successful()) {
                    $blogs = $response->json();

                    foreach ($blogs as &$blog) {
                        if (isset($blog['featured_media']) && $blog['featured_media']) {

                            $mediaCacheKey = 'media_' . $blog['featured_media'];
                            $media = Cache::remember($mediaCacheKey, now()->addMinutes(60), function () use ($blog) {
                                $mediaResponse = Http::get('https://liftpal.ir/blogpress/wp-json/wp/v2/media/' . $blog['featured_media'] . '?_fields=id,source_url');
                                return $mediaResponse->successful() ? $mediaResponse->json() : null;
                            });

                            if ($media) {
                                $blog['featured_image_url'] = $media['source_url'];
                            } else {
                                $blog['featured_image_url'] = null;
                            }
                        } else {
                            $blog['featured_image_url'] = null;
                        }
                    }
                    return $blogs;
                } else {
                    return [];
                }
            });
        } catch (Throwable $e) {
            $this->blogs = [];
            Log::error('API : Get Blog in Home Index Error : ' . $e->getMessage());
        }


    }


    public function blogList()
    {


    }


    public function render()
    {



        $websiteTitle = getSetting('website_title');

//
//        $specialProduct = Product::where('is_active', '=', 1)
//            ->where('id', 18)
//            ->with(['variants', 'images'])
//            ->first();


        $products = cache()->remember('home_products', now()->addHours(12), function () {
            return Product::where('is_active', '=', 1)
                ->latest()
                ->take(12)
                ->with(['variants', 'images'])
                ->get();
        });


//        if ($specialProduct) {
//            $products->prepend($specialProduct);
//        }

        return view('livewire.app.home.home-index', compact('products'))
            ->title($websiteTitle ?? 'Home');
    }





}
