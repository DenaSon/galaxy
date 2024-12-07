<?php

namespace App\Livewire\App\Blog;

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
        return view('livewire.app.blog.single-blog')
            ->title($this->article['title']['rendered'] ?? "");
    }
}
