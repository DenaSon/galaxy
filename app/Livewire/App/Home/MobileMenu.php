<?php

namespace App\Livewire\App\Home;
use App\Models\Cart;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use Mary\Traits\Toast;
#[Layout('components.layouts.app')]

class MobileMenu extends Component
{
use Toast;

    public $title;

    public $cartCount;

    #[On('cartUpdated')]
    public function getCartCount()
    {
        $this->cartCount = auth()?->user()?->carts()?->count() ?? 0;
    }

    public function mount()
    {
        $this->title = 'Mobile Menu';
        $this->cartCount = auth()?->user()?->carts()?->count() ?? 0;
    }

    public function openLogin()
    {
        $this->dispatch('openLoginModal');
    }
    public function showCart()
    {
        $this->dispatch('openCartBox');
    }

    public function toaster()
    {
       $this->info('سبد خرید','هنوز محصولی به سبد خرید اضافه نکرده اید',css: 'bg-primary text-white');
    }

    public function render()
    {
        return view('livewire.app.home.mobile-menu')
        ->title('');
    }
}
