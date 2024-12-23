<?php

namespace App\Livewire\App\Blog;

use App\Models\Product;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;

#[Layout('components.layouts.app')]
class SingleBlog extends Component
{
    use Toast;

    public $blog;
    public $article;
    public $suggestedArticles = [];


    public function mount()
    {
        $response = Http::get('https://denapax.com/blogpress/wp-json/wp/v2/posts/' .
            $this->blog.'?_fields=id,title,content,yoast_head_json,excerpt,date,modified,categories,tags');

        if ($response->successful()) {
            $this->article = $response->json();

        } else {
            abort(404);
        }



        //get suggest articles
        $this->getSuggestedArticles();


    }


    private function getSuggestedArticles()
    {
        // Fetch suggested articles based on categories or tags
        $categoryIds = $this->article['categories'] ?? [];
        $tagIds = $this->article['tags'] ?? [];

        // Build query parameters for fetching suggested articles
        $queryParams = [
            '_fields' => 'id,title',
            'per_page' => 5, // Limit to 5 suggested articles
            'exclude' => [$this->article['id']], // Exclude the current article
        ];

        if (!empty($categoryIds)) {
            $queryParams['categories'] = implode(',', $categoryIds);
        } elseif (!empty($tagIds)) {
            $queryParams['tags'] = implode(',', $tagIds);
        }

        $suggestedResponse = Http::get('https://denapax.com/blogpress/wp-json/wp/v2/posts', $queryParams);

        if ($suggestedResponse->successful())
        {
            $this->suggestedArticles = $suggestedResponse->json();
        }

    }



    public function render()
    {
        $articleTitle = $this->article['title']['rendered'];

        $productList = Product::where('name', 'like', "%$articleTitle%")
            ->where('is_active', 1)
            ->take(4)->get();
        if ($productList->isEmpty()) {
            $productList = Product::inRandomOrder()->take(4)->get();
        }

        return view('livewire.app.blog.single-blog', compact('productList'))
            ->title($this->article['title']['rendered'] ?? "");
    }
}
