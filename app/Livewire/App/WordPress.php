<?php

namespace App\Livewire\App;

use Corcel\Model\Post;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;

#[Layout('components.layouts.app')]
class WordPress extends Component
{
    use Toast;

    public function mount()
    {

    }

    public function render()
    {
        $posts = Post::where('post_status', 'publish')->get();

        return view('livewire.app.word-press')->with(['posts' => $posts])
            ->title('Wordpress');
    }
}
