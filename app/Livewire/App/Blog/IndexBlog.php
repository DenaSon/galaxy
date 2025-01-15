<?php

namespace App\Livewire\App\Blog;

use Illuminate\Support\Facades\Cache;
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

    private function fetchBlogs()
    {
        $cacheKey = "blogs_{$this->per_page}_{$this->searchTerm}_" . implode(',', $this->category);

        return Cache::remember($cacheKey, 300, function () {
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

            if (!$response->successful()) {
                return [];
            }

            $blogs = $response->json();

            foreach ($blogs as &$blog) {
                $blog['featured_image_url'] = $this->fetchFeaturedImage($blog['featured_media'] ?? null);
            }

            return $blogs;
        });
    }

    private function fetchFeaturedImage($mediaId)
    {
        if (!$mediaId) {
            return null;
        }

        $cacheKey = "featured_image_{$mediaId}";

        return Cache::remember($cacheKey, 3600, function () use ($mediaId) {
            $mediaResponse = Http::get('https://denapax.com/blogpress/wp-json/wp/v2/media/' . $mediaId, [
                '_fields' => 'id,source_url'
            ]);

            if ($mediaResponse->successful()) {
                $media = $mediaResponse->json();
                return $media['source_url'] ?? null;
            }

            return null;
        });
    }

    private function fetchCategories()
    {
        return Cache::remember('categories_list', 3600, function () {
            $response = Http::get('https://denapax.com/blogpress/wp-json/wp/v2/categories?_fields=id,name,count');

            return $response->successful() ? $response->json() : [];
        });
    }

    private function fetchCategoryName()
    {
        if (!$this->category) {
            return 'دانشنامه';
        }

        $cacheKey = "category_name_{$this->category}";

        return Cache::remember($cacheKey, 3600, function () {
            $response = Http::get('https://denapax.com/blogpress/wp-json/wp/v2/categories/' . $this->category);

            if ($response->successful()) {
                $categoryData = $response->json();
                return $categoryData['name'] ?? 'دانشنامه';
            }

            return 'دانشنامه';
        });
    }

    public function render()
    {
        try {
            $blogs = $this->fetchBlogs();
            $categories_list = $this->fetchCategories();
            $this->category_name = $this->fetchCategoryName();
        } catch (\Throwable $e) {
            $blogs = [];
            $categories_list = [];
            $this->category_name = 'دانشنامه';
            Log::error('Error fetching blogs: ' . $e->getMessage());
        }

        $title = $this->category_name ? 'بایگانی ' . $this->category_name : 'دانشنامه';

        return view('livewire.app.blog.index-blog', compact('blogs', 'categories_list'))
            ->title($title);
    }
}
