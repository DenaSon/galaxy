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
    public $per_page = 9;
    public function addBlogs()
    {
        $this->per_page += 6; // Livewire will handle reactivity and re-render
    }

    private function loadBlogs()
    {


    }


    public function mount()
    {
        $this->loadBlogs();
    }


    public function render()
    {

        try {

            $params = [
                '_embed' => true,
                'per_page' => $this->per_page ,
                '_fields' => 'id,title,featured_media',
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



            } else {
                $blogs = [];
            }
        } catch (\Throwable $e) {
            $blogs = [];
            Log::error('Error fetching blogs: ' . $e->getMessage());
        }



        return view('livewire.app.blog.index-blog',compact('blogs'))
            ->title('پایگاه دانستنی های دناپکس');
    }
}
