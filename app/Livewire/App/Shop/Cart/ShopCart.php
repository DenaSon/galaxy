<?php

namespace App\Livewire\App\Shop\Cart;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;
use Throwable;

#[Layout('components.layouts.app')]
class ShopCart extends Component
{
    use Toast;

    public $products = [];
    public $variant;

    public Cart $cart;

    public $carts = [];

    public $shippingCost = 0;
    public $totalCost;
    public $cartCost;

    public function increaseQty(Cart $cart)
    {
        try {
            Gate::authorize('access-cart', $cart);
            $cart->quantity = $cart->quantity +1;
            $cart->save();
            $this->getTotalCost();
        }
        catch (Throwable $e)
        {
            Log::error($e->getMessage());
        }
    }

    public function decreaseQty(Cart $cart)
    {
        try {
            Gate::authorize('access-cart', $cart);

            if ($cart->quantity > 1) {
                $cart->quantity = $cart->quantity -1;
                $cart->save();
            } else {
                $cart->delete();

            }

            $this->getTotalCost();
        }
        catch (Throwable $e)
        {
            Log::error($e->getMessage());
        }
    }


    public function getTotalCost(): void
    {

        $this->cartCost = Auth::user()->carts->sum(fn($cart) => $cart->variant->price * $cart->quantity);


        if (session()->has('shippingCost')) {
            session()->forget('shippingCost');
        }

        session()->put('shippingCost', $this->shippingCost);

    }

    public function regAddress()
    {
        $this->dispatch('openAddressModal');

    }

    public function mount()
    {
        if (!Auth::user()->carts()->exists())
        {
            $this->info('محصولی به سبد خرید اضافه نکرده اید');
            $this->redirectRoute('home.index-home', [], true, true);
        }
    }


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
        if (!Auth::user()->carts()->exists())
        {
            $this->info('سبد خرید شما خالی است');
            return redirect()->route('home.index-home');

        }

        $this->getTotalCost();
        return view('livewire.app.shop.cart.shop-cart')
            ->title('سبد خرید');
    }
}
