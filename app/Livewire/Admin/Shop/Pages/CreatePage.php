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

    public $title;
    public $schema_code;
    public $content;
    public $is_active = false;

    public function save()
    {
        $this->validate([
            'title' => 'required',
            'schema_code' => 'nullable',
            'content' => 'required',
            'is_active' => 'nullable'
        ]);
         Page::create([
            'title' => $this->title,
            'schema' => $this->schema_code,
            'content' => $this->content,
            'is_active' => true,

        ]);

        $this->info('Page created');
    }

    public function render()
    {
        return view('livewire.admin.shop.pages.create-page')
        ->title('ایجاد صفحه');
    }
}
