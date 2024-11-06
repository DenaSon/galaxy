<?php

namespace App\Livewire\Admin\Blog;

use App\Models\Blog;
use App\Models\Category;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;


#[Layout('components.layouts.admin')]
class EditBlog extends Component
{
    use Toast, \Livewire\WithFileUploads;

    public $title = '';
    public $content = '';
    public $draft = false;
    public $additionalInfo = '';
    public $selectedCategories = [];
    public $selectedSubCategories = [];
    public $subCategories;
    public $photo;


    public function save()
    {

//               $this->validate([
//                       ''=>'',
//
//                   ]);


        $this->success(
            'انجام شد',
            'با موفقیت <strong>ذخیره شد </strong>',
            position: 'bottom-end',
            icon: 'o-check-badge',
            css: 'bg-pink-500 text-base-100'
        );


    }

    public function mount(Blog $blog)
    {
        $this->title = $blog->title;
        $this->content = $blog->content;
        $this->additionalInfo = $blog->additional_info;
        $this->selectedCategories = $blog->categories->where('parent_id', null)->pluck('id')->toArray();
        $this->subCategories = Category::whereIn('parent_id', $this->selectedCategories)->get();
        $this->photo = $blog->images->first()->file_path ?? '';
    }


    public function render()
    {
        $categories_list = Category::query()->onlyParent()->blogs()->latest()->get();

        return view('livewire.admin.blog.edit-blog', compact('categories_list'))
            ->title('ویرایش مقاله');
    }
}
