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
    protected $listeners = [
        'loadMore' => 'loadMore',
    ];

    public function loadMore()
    {
        $this->perPage += 2;

    }

    public $perPage = 6;




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
