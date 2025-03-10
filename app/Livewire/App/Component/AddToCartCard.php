<?php

namespace App\Livewire\App\Component;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Mary\Traits\Toast;

#[Layout('components.layouts.app')]
class AddToCartCard extends Component
{
    use Toast;

    public Product $product;
    #[Validate('numeric|exists:variants,id')]
    public  $variant;


    #[Validate('numeric|exists:variants,id')]
    public $selectedVariant;
    public $showCartButton  = false;


    public function mount()
    {

        $this->selectedVariant = $this->product->variants()->orderBy('price')->first() ?? 0;


    }

    public function updatedVariant($value)
    {

        $this->selectedVariant = $this->product->variants->find($this->variant);
        $this->showCartButton  = false;

    }


    public function addToCart()
    {
        if (!auth()->check())
        {
            return;
        }
        $this->showCartButton = true;

        $this->dispatch('cartUpdated');

        $this->success(
            'محصول به سبد خرید اضافه شد',
            position: 'toast-top toast-start',
            icon: 'o-check',
            css: 'bg-success text-white', timeout: 1500
        );

        $cartItem = Cart::where('product_id', $this->product->id)
            ->where('variant_id', $this->selectedVariant->id)
            ->where('user_id', auth()->id())
            ->first();

        if ($cartItem) {

            $cartItem->quantity += 1;
            $cartItem->save();
        }
        else
        {

            $cart = new Cart();
            $cart->product()->associate($this->product);
            $cart->variant_id = $this->selectedVariant->id;
            $cart->user_id = auth()->id();
            $cart->quantity = 1;
            $cart->save();
        }


    }


    public function render()
    {
        return view('livewire.app.component.add-to-cart-card');

    }
}
