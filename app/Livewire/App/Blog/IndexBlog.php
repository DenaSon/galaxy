<?php

namespace App\Livewire\App\Blog;

use Corcel\Model\Post;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use Mary\Traits\Toast;

#[Layout('components.layouts.app')]
class IndexBlog extends Component
{
    use Toast, WithPagination;

    public $searchTerm;

    #[Url]
    public $per_page = 18;
    #[Url]
    public $category = [];

    public $category_name;


    public function render()
    {
        try {

            $blogs = Cache::remember('blogs_page_' . request('page', 1), 3600, function () {
                return Post::type('post')->published()->orderBy('post_date', 'desc')->paginate(18);
            });

        } catch (\Throwable $e) {
            $blogs = [];
            $category_name = '';
            $categories_list = [];
            Log::error('Error fetching blogs: ' . $e->getMessage());
        }

        $title = $this->category_name ? 'بایگانی ' . $this->category_name : 'دانشنامه';

        return view('livewire.app.blog.index-blog', compact('blogs'))
            ->title($title);
    }
}
