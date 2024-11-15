<?php

namespace App\Livewire\App\Home;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;
#[Layout('components.layouts.app')]

class VisualCategoryList extends Component
{
use Toast;

    public function mount()
    {

    }

    public function render()
    {
        return view('livewire.app.home.visual-category-list')
        ->title('');
    }
}
