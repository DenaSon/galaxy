<?php

namespace App\Livewire\App\Blog;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Mary\Traits\Toast;

#[Layout('components.layouts.app')]
class IndexBlog extends Component
{
    use Toast;

    public $searchTerm;

    #[Url]
    public $per_page = 18;
    #[Url]
    public $category = [];

    public $category_name;




    public function addBlogs()
    {
        $this->per_page += 18; // Livewire will handle reactivity and re-render
    }

    public function updatedSearchTerm($value)
    {
        $this->validate(['searchTerm' => 'string|max:45|min:1']);
        $this->searchTerm = $value;
    }




    public function render()
    {
        try {
            $params = [
                '_embed' => true,
                'per_page' => $this->per_page,
                '_fields' => 'id,title,featured_media,excerpt,date,modified',
                'search' => $this->searchTerm ?? '',
                'orderby' => 'date',
                'order' => 'desc',
                'categories' => $this->category,

            ];

            $response = Http::get('https://denapax.com/blogpress/wp-json/wp/v2/posts', $params);

            if ($response->successful()) {
                $blogs = $response->json();

                foreach ($blogs as &$blog) {
                    if (isset($blog['featured_media']) && $blog['featured_media']) {
                        $mediaResponse = Http::get('https://denapax.com/blogpress/wp-json/wp/v2/media/' . $blog['featured_media'], [
                            '_fields' => 'id,source_url'
                        ]);

                        if ($mediaResponse->successful()) {
                            $media = $mediaResponse->json();
                            $blog['featured_image_url'] = $media['source_url'] ?? null;
                        } else {
                            $blog['featured_image_url'] = null;
                        }
                    } else {
                        $blog['featured_image_url'] = null;
                    }
                }

            }
            else {
                $blogs = [];
            }

            $category_response = Http::get('https://denapax.com/blogpress/wp-json/wp/v2/categories?_fields=id,name,count');
            if ($category_response->successful()) {
                $categories_list = $category_response->json();
            }
            else
            {
                $categories_list = [];
            }

                if ($this->category)
                {
                    $category_name_url = 'https://denapax.com/blogpress/wp-json/wp/v2/categories/'.$this->category;
                    $category_name_response = Http::get($category_name_url);
                    if ($category_name_response->successful()) {

                        $category_data = $category_name_response->json();


                        $this->category_name = $category_data['name'];

                    }
                    else
                    {
                        $this->category_name = 'دانشنامه';
                    }
                }



        } catch (\Throwable $e) {
            $blogs = [];
            $category_name = '';
            $categories_list = [];
            Log::error('Error fetching blogs: ' . $e->getMessage());
        }

        $title = $category_name ?? '';

        return view('livewire.app.blog.index-blog', compact('blogs','categories_list'))
            ->title($title);
    }
}
