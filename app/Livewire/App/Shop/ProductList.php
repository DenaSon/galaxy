<?php

namespace App\Livewire\App\Shop;
use App\Models\Category;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;
use Mary\Traits\Toast;
#[Layout('components.layouts.app')]

class ProductList extends Component
{
    use Toast,WithPagination;
    protected $paginationTheme = 'tailwind'; // Optional: Tailwind theme for pagination

    public $category;

    public $ranking = 5;


    public function mount(Category $category)
    {

        $this->category = $category;

    }

    public function render()
    {
        $products = $this->category->products()->where('is_active',1)->paginate(18
        );

        return view('livewire.app.shop.product-list', compact('products'))
            ->title('خرید ' . ($this->category->name ?? getSetting('website_title')));
    }
}
