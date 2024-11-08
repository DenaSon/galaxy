<?php

namespace App\Livewire\Admin\Shop;
use App\Models\Category;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use Mary\Traits\Toast;
#[Layout('components.layouts.admin')]

class CreateProduct extends Component
{
    use Toast, WithFileUploads;

    public $name = '';
    public $content = '';
    public $description = '';
    public $draft = false;
    public $additionalInfo = '';
    public array $selectedCategories = [];
    public array $selectedSubCategories = [];
    public $subCategories;
    public array $photos = [];


    public function updatedSelectedCategories()
    {
        if (empty($this->selectedCategories))
        {
            $this->subCategories = null;
        }
        else
        {
            $this->subCategories = Category::whereIn('parent_id', $this->selectedCategories)->get();
            dd($this->photos);
        }
    }



    public function mount()
    {
        $this->categories_list = Category::get();
    }

    public function render()
    {
        $categories_list = Category::query()->onlyParent()->where('type','product')->latest()->get();
        return view('livewire.admin.shop.create-product',compact('categories_list'))
        ->title('');
    }

}
