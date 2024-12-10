<?php

namespace App\Livewire\App\Component;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Variant;
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


    public function mount()
    {

        $this->selectedVariant = $this->product->variants()->orderBy('price')->first();

    }

    public function updatedVariant($value)
    {

        $this->selectedVariant = $this->product->variants->find($this->variant);

    }


    public function addToCart()
    {
        if (!auth()->check())
        {
            return;
        }

        $this->dispatch('cartUpdated');

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
