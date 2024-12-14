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


    public $categories = [];
    public $selectedCategories = [];
    protected $paginationTheme = 'tailwind';
    protected $listeners = [
        'loadMore' => 'loadMore',
    ];
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
        $productsQuery = Product::active()->latest();
        if (!empty($this->selectedCategories) && is_array($this->selectedCategories)) {
            $this->validate([
                'selectedCategories' => 'array', // Ensure it's an array
                'selectedCategories.*' => 'numeric|exists:categories,id', // Validate each item in the array
            ]);

            $productsQuery->whereHas('categories', function ($query) {
                $query->whereIn('categories.id', $this->selectedCategories);
            });
        }
        else
        {
            $productsQuery = Product::active()->latest();
        }


        return view('livewire.app.shop.store', [
            'products' => $productsQuery->paginate($this->perPage),
            'categories' => $this->categories,
        ])->title('دناپکس | فروشگاه خرید خشکبار و سوغات');
    }
}
