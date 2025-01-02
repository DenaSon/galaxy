<?php

namespace App\Livewire\App\Shop;

use App\Models\Product;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Lazy;
use Livewire\Component;
use Mary\Traits\Toast;
use Throwable;

#[Layout('components.layouts.app')]
#[Lazy]
class RelatedBlog extends Component
{
    use Toast;

    public $relatedBlog = 0;



    public function mount(Product $product)
    {
        $this->relatedBlog = $product->related_article_id;
    }


    public function render()
    {
        $blogContent = [];
        try {
            $articleId = $this->relatedBlog;

            $response = Http::get("https://denapax.com/blogpress/wp-json/wp/v2/posts/{$articleId}?_fields=content,id,title");

            if ($response->successful()) {
                $blogContent = $response->json();
            }
            else
            {

                logger()->error("Failed to fetch blog content for article ID: {$articleId}", [
                    'status' => $response->status(),
                    'body' => $response->body()
                ]);
            }

        }
        catch (Throwable $exception) {

            logger()->error($exception->getMessage());
        }

        return view('livewire.app.shop.related-blog', compact('blogContent'));
    }
}
