<?php

namespace App\Livewire\Admin\Blog;

use App\Models\Blog;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;
use Throwable;

#[Layout('components.layouts.admin')]
class ListBlog extends Component
{
    use Toast;


    public function deleteBlog(Blog $blog)
    {
        try {

            $blog->load(['categories', 'images']);


            $blog->categories()->detach();
            $blog->images()->delete();


            $blog->delete();

            $this->success('مقاله حذف شد');
        } catch (Throwable $e) {
            $this->error('خطا', $e->getMessage());
        }
    }

    public function mount()
    {

    }


    public function render()
    {
        $blog = Blog::with('categories')->latest('created_at')->get();
        return view('livewire.admin.blog.list-blog', compact('blog'))
            ->title('لیست مقالات');
    }
}
