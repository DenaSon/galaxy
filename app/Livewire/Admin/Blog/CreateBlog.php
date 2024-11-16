<?php

namespace App\Livewire\Admin\Blog;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Image;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use Mary\Traits\Toast;

#[Layout('components.layouts.admin')]
class CreateBlog extends Component
{
    use Toast, WithFileUploads;

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
        $this->validate(
            [
                'title' => 'required|string|max:255',
                'content' => 'string',
                'photo' => 'required|image',
                'selectedCategories' => 'required|exists:categories,id',
                'additionalInfo' => 'nullable|string|max:224'
            ]
        );

        $draft = $this->draft ? 0 : 1;

        $blog = Blog::create([
            'user_id' => auth()->id() ?? 0,
            'title' => $this->title,
            'content' => $this->content,
            'description' => '',
            'additional_info' => $this->additionalInfo,
            'is_active' => $draft,
        ]);

        $blog->categories()->attach($this->selectedCategories);
        $blog->categories()->attach($this->selectedSubCategories);
        $this->saveImage($this->photo, $blog->id);
        $this->toast('success', 'مقاله ذخیره شد');
        $this->redirectRoute('master.blog.list', [], true, true);

    }

    public function mount()
    {

    }

    public function updatedSelectedCategories()
    {
        if (empty($this->selectedCategories))
        {
            $this->subCategories = null;
        }
        else
        {
            $this->subCategories = Category::whereIn('parent_id', $this->selectedCategories)->get();
        }
    }

    private function saveImage($photo, $blogId)
    {
        $filePath = $photo->store('/photos/blog', 'public');

        $fileName = $photo->getClientOriginalName();

        // $this->optimizeImage($filePath,$fileName);
        Image::create([
            'file_path' => $filePath,
            'imageable_type' => Blog::class,
            'imageable_id' => $blogId
        ]);
    }


    public function render()
    {
        $categories_list = Category::query()->onlyParent()->blogs()->latest()->get();

        return view('livewire.admin.blog.create-blog', compact('categories_list'))
            ->title('ایجاد مقاله');
    }
}
