<?php

namespace App\Livewire\Admin\Blog;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Support\Carbon;
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

    public $blog;


    public function save(Blog $blog = null)
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'content' => 'string',
            'photo' => 'nullable|image', // Photo should be nullable for updates
            'selectedCategories' => 'required|exists:categories,id',
            'additionalInfo' => 'nullable|string|max:224'
        ]);

        $draft = $this->draft ? 0 : 1;

        if ($blog) {
            // Update the existing blog
            $blog->update([
                'title' => $this->title,
                'content' => $this->content,
                'additional_info' => $this->additionalInfo,
                'update_date' => Carbon::now(),
                'is_active' => $draft,
            ]);
            $message = 'مقاله به‌روزرسانی شد';
        } else {
            // Create a new blog
            $blog = Blog::create([
                'user_id' => auth()->id() ?? 0,
                'title' => $this->title,
                'content' => $this->content,
                'description' => '',
                'additional_info' => $this->additionalInfo,

                'is_active' => $draft,
            ]);
            $message = 'مقاله ذخیره شد';
        }

        // Sync categories and subcategories
        $blog->categories()->sync(array_merge($this->selectedCategories, $this->selectedSubCategories));

        // Save or update the image only if a new photo is uploaded
        if ($this->photo) {
            $this->saveImage($this->photo, $blog->id);
        }

        // Display a success message and redirect
        $this->toast('success', $message);
        $this->redirectRoute('master.blog.list', [], true, true);
    }





    public function updatedSelectedCategories()
    {
        if (empty($this->selectedCategories)) {
            $this->subCategories = null;
        }
        else {
            $this->subCategories = Category::whereIn('parent_id', $this->selectedCategories)->get();
        }
    }


    private function saveImage($photo,$blogId)
    {
        $filePath = $photo->store('/photos/blog', 'public');

        // Find the existing image record associated with the blog
        $image = Image::where('imageable_type', Blog::class)
            ->where('imageable_id', $blogId)
            ->first();

        // If an image record exists, update it; otherwise, create a new one
        if ($image) {
            $image->update([
                'file_path' => $filePath,

            ]);
        } else {
            Image::create([
                'file_path' => $filePath,
                'imageable_type' => Blog::class,
                'imageable_id' => $blogId,
            ]);
        }

    }

    public function mount(Blog $blog)
    {
        $this->title = $blog->title;
        $this->content = $blog->content;
        $this->additionalInfo = $blog->additional_info;
        $this->selectedCategories = $blog->categories->where('parent_id', null)->pluck('id')->toArray();
        $this->subCategories = Category::whereIn('parent_id', $this->selectedCategories)->get();
        $this->photo = $blog->images->first()->file_path ?? '';
        $this->blog = $blog->id;
        $this->draft  = $blog->is_active;
    }


    public function render()
    {
        $categories_list = Category::query()->onlyParent()->blogs()->latest()->get();

        return view('livewire.admin.blog.edit-blog', compact('categories_list'))
            ->title('ویرایش مقاله');
    }
}
