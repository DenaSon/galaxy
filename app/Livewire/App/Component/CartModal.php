<?php

namespace App\Livewire\App\Component;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Variant;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;


#[Layout('components.layouts.app')]

class CartModal extends Component
{
    use Toast;
    public Product $product;
    protected $listeners = ['openCartModal' => 'openCartModal'];
    public $cartModal = false;
    public $shippingCost = 0;


    public function openCartModal()
    {
        $this->cartModal = true;
    }

    public function mount()
    {

    }
    public function increaseVariant(Cart $cart)
    {
        if ($cart->quantity <= 10)
        {
            $cart->increment('quantity');
        }

        $this->calcShipping($cart);
    }

    public function decreaseVariant(Cart $cart)
    {
        if ($cart->quantity > 1)
        {
            $cart->decrement('quantity');
        }
        else
        {
            $this->warning('نوع ' . $cart->variant->type . ' از سبد خرید شما حذف شد', '');
            $cart->delete();

        }
    }





    public function render()
    {
        return view('livewire.app.component.cart-modal');
    }
}
