<?php

namespace App\Livewire\App\Shop;

use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;
use Mary\Traits\Toast;

#[Layout('components.layouts.app')]
class Store extends Component
{
    use Toast,WithPagination;
    public $categories = [];
    protected $paginationTheme = 'tailwind';

    public $selectedCategory = null;
    public $priceRange = ['min' => null, 'max' => null];







    public function mount()
    {

    }

    public function render()
    {
        return view('livewire.app.shop.store',[
            'products' => Product::latest()->paginate(10),
        ])
            ->title('دناپکس | فروشگاه خرید خشکبار و سوغات');
    }
}
