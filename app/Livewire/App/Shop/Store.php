<?php

namespace App\Livewire\App\Shop;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;
use Mary\Traits\Toast;

#[Layout('components.layouts.app')]
class Store extends Component
{
    use Toast, WithPagination;

    public $categories = [];
    public $searchTerm;
    public $selectedCategories = [];
    public $perPage = 6;

    protected $paginationTheme = 'tailwind';

    protected $listeners = [
        'loadMore' => 'loadMore',
    ];

    protected $rules = [
        'selectedCategories' => 'array',
        'selectedCategories.*' => 'numeric|exists:categories,id',
        'searchTerm' => 'string|nullable|max:15',
    ];

    public function mount()
    {
        $this->categories = Cache::get('layout-categories');
        if (! $this->categories) {

            $this->categories = Category::where('type', 'product')
                ->whereNull('parent_id')
                ->whereHas('products')
                ->get();

        }

    }

    public function updatedSelectedCategories()
    {
        // Validate when selectedCategories is updated
        $this->validate();
    }

    public function updatedSearchTerm()
    {
        // Validate when searchTerm is updated
        $this->validate();
    }

    public function loadMore()
    {
        $this->perPage += 12;
    }

    public function render()
    {
        $productsQuery = Product::query()
            ->active()
            ->latest()
            ->when(!empty($this->selectedCategories), function ($query) {
                $query->whereHas('categories', function ($query) {
                    $query->whereIn('categories.id', $this->selectedCategories);
                });
            })
            ->when(!empty($this->searchTerm), function ($query) {
                $query->where(function ($query) {
                    $query->where('name', 'like', '%' . $this->searchTerm . '%')
                        ->orWhere('description', 'like', '%' . $this->searchTerm . '%');
                });
            });

        return view('livewire.app.shop.store', [
            'products' => $productsQuery->paginate($this->perPage),
            'categories' => $this->categories,
        ])->title(getSetting('website_title'));
    }

}
