<?php

namespace App\Livewire\App\Component;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use Mary\Traits\Toast;

#[Layout('components.layouts.app')]
class CartBox extends Component
{
    use Toast;

    public bool $cartBox = false;
    public $products = [];
    public $variant;

    public Cart $cart;

    public $shippingCost = 0;
    public $totalCost;
    public $cartCost;

    //protected $listeners = ['openCartBox' => 'openCartBox'];

    #[On('openCartBox')]
    public function openCartBox()
    {
        $this->cartBox = true;
        $this->getTotalCost();

    }

    #[On('closeCartBox')]
    public function closeCartBox()
    {
        $this->cartBox = false;

    }

    public function increaseQty(Cart $cart)
    {
        Gate::authorize('access-cart', $cart);
        $cart->increment('quantity');
        $this->getTotalCost();
    }

    public function decreaseQty(Cart $cart)
    {
        Gate::authorize('access-cart', $cart);

        if ($cart->quantity > 1) {
            $cart->decrement('quantity');
        } else {
            $cart->delete();
            // $this->cartBox = false;
        }

        $this->getTotalCost();
    }


    public function getTotalCost(): void
    {

        $this->cartCost = Auth::user()->carts->sum(fn($cart) => $cart->variant->price * $cart->quantity);
        //$this->totalCost = $this->cartCost + $this->shippingCost;
        //$this->shippingCost =  $this->calcShippingCost();

        if (session()->has('shippingCost')) {
            session()->forget('shippingCost');
        }

        session()->put('shippingCost', $this->shippingCost);

    }


    public function regAddress()
    {
        $this->dispatch('openAddressModal');

    }

    /**
     * @throws \Exception
     */
    public function registerOrder()
    {
        $user = Auth::user();
        $address = $user->addresses()->where('is_default', '=', 1)->with(['city', 'province'])->first();

        if (!$address) {
            throw new \Exception('User does not have a registered address.');
        }
        $fullAddress = getShippingAddress($address);

        $this->redirectRoute('panel.checkout', [], true, true);
    }


    public function render()
    {
        return view('livewire.app.component.cart-box')
            ->title('');
    }
}
