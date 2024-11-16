<?php

namespace App\Livewire\App\Component;
use App\Models\Blog;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Lazy;
use Livewire\Component;
use Mary\Traits\Toast;
#[Layout('components.layouts.app')]

class BlogCard extends Component
{
use Toast;
    public Blog $blog;

    public function mount($blog)
    {

    }

    public function render()
    {
        return view('livewire.app.component.blog-card')
        ->title('');
    }
}
