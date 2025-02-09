<?php

namespace App\Livewire\Admin\Shop;
use App\Models\Category;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Mary\Traits\Toast;

#[Layout('components.layouts.admin')]
#[Lazy]
#[Title('دسته ها | فروشگاه')]
class Categories extends Component
{
    use Toast,WithPagination;

    public array $expanded = [2];
    public bool $edit_category_modal = false;

    public $name = null;
    public $type  = 'product';
    public $description  = null;
    public ?int $parentList_id = null;

    public  $parentList;

    public $selectedCategory = null;
    public $selectedCategoryId =null;
    public $selectedCategoryType = null;
    public $selectedCategoryDescription;

    public function save()
    {
        $this->validate([
            'name' => 'string|required|max:200',
            'description' => 'nullable|string|max:200',
            'parentList' => 'nullable|numeric|exists:categories,id'
        ]);

        // Check for duplicate category only if parentList is null
        if ($this->parentList == null) {
            $categoryExists = Category::whereNull('parent_id')->where('name', $this->name)->exists();

            if ($categoryExists) {
                $this->warning('خطا', 'دسته تکراری است');
                return;
            }
        }

        // Create the category
        Category::create([
            'name' => $this->name,
            'type' => $this->type,
            'parent_id' => $this->parentList,
            'description' => $this->description
        ]);

        // Notify user of success
        $this->success(
            'انجام شد',
            'با موفقیت <strong>ذخیره شد </strong>',
            position: 'bottom-end',
            icon: 'o-check-badge',
            css: 'bg-pink-500 text-base-100'
        );

        // Reset the form
        $this->reset();
    }

    public function editCategory($categoryId)
    {
        $this->edit_category_modal = true;
        $category = Category::find($categoryId);
        $this->selectedCategoryType = 'category';
        $this->selectedCategory = $category->name ;
        $this->selectedCategoryDescription = $category->description ;
        $this->selectedCategoryId = $category->id ;

    }

    public function editSubCategory($categoryId)
    {
        $this->edit_category_modal = true;
        $category = Category::find($categoryId);
        $this->selectedCategoryType = 'subcategory';
        $this->selectedCategory = $category->name ;
        $this->selectedCategoryDescription = $category->description ;
        $this->selectedCategoryId = $category->id ;

    }

    public function updateCategory()
    {
        // Validate input data
        $this->validate([
            'selectedCategory' => 'required|string|max:255',
            'selectedCategoryDescription' => 'nullable|string|max:1000',
        ]);

        // Find the category and handle the case where it might not exist
        $category = Category::find($this->selectedCategoryId);
        if (!$category) {
            $this->error('Category not found.');
            return;
        }

        // Update category attributes
        $category->update([
            'name' => $this->selectedCategory,
            'description' => $this->selectedCategoryDescription,
        ]);

        // Close the modal and provide feedback
        $this->edit_category_modal = false;
        $this->info('ویرایش شد :  ' . $this->selectedCategory);
    }


    public function deleteCategory(Category $category)
    {
        $this->deleteChildren($category);

        $category->delete();

        $this->warning('دسته حذف شد');
    }
    public function deleteSubCategory(Category $category)
    {

        $category->delete();

        $this->warning('زیر دسته حذف شد');
    }

    private function deleteChildren(Category $category)
    {
        foreach ($category->children as $child) {
            $this->deleteChildren($child);
            $child->delete();
        }
    }

    public function render()
    {

        $categories = Category::whereParentId(null)->where('type','=','product')->latest()->paginate(10);

        $category_list = Category::whereParentId(null)

            ->where('type','=','product')
            ->get(['id','name']);
        return view('livewire.admin.blog.categories',compact('categories','category_list'))
            ->title('دسته');
    }
}
