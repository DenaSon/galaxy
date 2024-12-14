<?php

namespace App\Livewire\App\Shop;

use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;
use Mary\Traits\Toast;

#[Layout('components.layouts.app')]
class Store extends Component
{
    use Toast, WithPagination;

    protected $rules = [
        'selectedCategories' => 'array',
        'selectedCategories.*' => 'numeric|exists:categories,id',
    ];
    public $categories = [];
    public $selectedCategories = [];
    protected $paginationTheme = 'tailwind';
    protected $listeners = [
        'loadMore' => 'loadMore',
    ];

    public function updatedSelectedCategories()
    {
        // Validate only when selectedCategories is updated
        $this->validate();
    }
    public $perPage = 6;

    public function loadMore()
    {

        $this->perPage += 6;

    }

    public function mount()
    {
        $this->categories = Category::where('type', '=', 'product')
            ->where('parent_id', '=', null)
            ->get();
    }

    public function render()
    {
        $this->validate([
            'selectedCategories' => 'array',
            'selectedCategories.*' => 'numeric|exists:categories,id',
        ]);
        $productsQuery = Product::active()->latest();
        if (!empty($this->selectedCategories) && is_array($this->selectedCategories)) {


            $productsQuery->whereHas('categories', function ($query) {
                $query->whereIn('categories.id', $this->selectedCategories);
            });
        }
        else
        {
            $productsQuery = Product::active()->latest();
        }


        // Initialize query
        $productsQuery = Product::active()->latest();

        // Apply category filters if any
        if (!empty($this->selectedCategories)) {
            $productsQuery->whereHas('categories', function ($query) {
                $query->whereIn('categories.id', $this->selectedCategories);
            });
        }

        // Render view
        return view('livewire.app.shop.store', [
            'products' => $productsQuery->paginate($this->perPage),
            'categories' => $this->categories,
        ])->title('دناپکس | فروشگاه خرید خشکبار و سوغات');
    }
}
