<?php

namespace App\Livewire\App\Shop;
use App\Models\Page;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;
#[Layout('components.layouts.app')]

class SinglePage extends Component
{
    use Toast;
    public Page $page;

    public function mount(Page $page)
    {
        $this->page = $page;
    }

    public function render()
    {
        $title = $this->page->title;
        return view('livewire.app.shop.single-page')
        ->title($title);
    }
}
