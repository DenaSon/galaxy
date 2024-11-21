<?php

namespace App\Livewire\App\Blog;
use App\Models\Blog;
use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;
#[Layout('components.layouts.app')]

class SingleBlog extends Component
{
    use Toast;

    public Blog $blog;

    public function mount()
    {

    }

    public function render()
    {
        return view('livewire.app.blog.single-blog')
        ->title(  $this->blog->title);
    }
}
