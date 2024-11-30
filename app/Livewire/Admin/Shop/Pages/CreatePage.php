<?php

namespace App\Livewire\Admin\Shop\Pages;
use App\Models\Page;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;
#[Layout('components.layouts.app')]

class CreatePage extends Component
{
    use Toast;

    public function mount(Page $page)
    {

    }

    public function render()
    {
        return view('livewire.admin.shop.pages.create-page')
        ->title('');
    }
}
