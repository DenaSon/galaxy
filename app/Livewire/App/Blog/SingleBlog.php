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

    public function mount()
    {
        $response = Http::get('https://denapax.com/blogpress/wp-json/wp/v2/posts/' . $this->blog);

        if ($response->successful()) {
            $this->article = $response->json();

        } else {
            abort(404);
        }
    }

    public function render()
    {
        $articleTitle = $this->article['title']['rendered'];

        $productList = Product::where('name', 'like', "%$articleTitle%")->take(6)->get();
        if ($productList->isEmpty()) {
            $productList = Product::inRandomOrder()->take(6)->get();
        }

        return view('livewire.app.blog.single-blog', compact('productList'))
            ->title($this->article['title']['rendered'] ?? "");
    }
}
