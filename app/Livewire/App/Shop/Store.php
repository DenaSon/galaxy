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

    public function loadMore()
    {
        $this->perPage += 12;
    }

    public $perPage = 10;




    public function mount()
    {

    }

    public function render()
    {
        return view('livewire.app.shop.store',[
            'products' => Product::latest()->paginate($this->perPage),
        ])
            ->title('دناپکس | فروشگاه خرید خشکبار و سوغات');
    }
}
