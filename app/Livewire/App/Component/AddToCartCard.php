<?php

namespace App\Livewire\App\Component;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Variant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Mary\Traits\Toast;
#[Layout('components.layouts.app')]

class AddToCartCard extends Component
{
    use Toast;

    public Product $product;

    public  $variant;

    public $variantList;
    public $livePrice;
    public $liveVariant;
    public $defaultVariant;

    public $variantCounts;

    public function mount()
    {


        $variants = $this->product->variants;

        $this->variantCounts = $variants->count();

        $this->livePrice = $variants->min('price');

        $this->defaultVariant = $variants->sortBy('price')->first();

        $this->variantList = $variants->sortBy('price')->toArray();
    }




    public function updatedVariant($value)
    {
        $this->validate([
            'variant' => 'numeric|exists:variants,id',
        ]);

        $limit = RateLimiter::attempt('update-cart'.$value.$this->product->id,20,function ()
        {
            $this->variantSelect();
        },120);

        if (!$limit)
        {
            $this->warning('لطفا بعدا مجدد سعی کنید');
        }



    }

    public function variantSelect()
    {

        $selectedVariant = $this->product->variants()->where('id', $this->variant)
            ->where('product_id', $this->product->id)
            ->first();


        if ($selectedVariant)
        {
            $this->livePrice = $selectedVariant->price;
        }
        else
        {
            Log::warning('Security breach attempt', ['variant_id' => $this->variant, 'product_id' => $this->product->id, 'user_id' => auth()->id() ?? 0]);

            abort(403,'خطای امنیتی | اطلاعات سیستم شما جهت بازرسی ثبت شد');
        }
    }

    public function  addToCart()
    {
        if (!Auth::check())
        {
            $this->info('ورود به حساب','جهت ثبت سفارش وارد حساب کاربری خود شوید');
            $this->dispatch('openLoginModal');
            return;
        }
        $this->doAddToCart();

    }

    private function doAddToCart()
    {
        if ($this->variant == null)
        {
            $variantId = $this->defaultVariant->id;
        }
        else
        {
            $variantId = $this->variant;
        }

        $exists = Cart::where('product_id',$this->product->id)->where('variant_id',$variantId)->first();


       if (!$exists)
       {
           $cart = new Cart();
           $cart->user_id = auth()->id();
           $cart->variant_id = $variantId;
           $cart->product_id = $this->product->id;
           $cart->status = 'active';
           $cart->quantity = 1;
           $cart->save();
           $this->info('سبد خرید','محصول به سبد خرید شما افزوده شد');
           $this->dispatch('openCartModal');
       }
        else
        {
            $cart = Cart::whereUserId(Auth::id())->where('product_id',$this->product->id)->where('variant_id',$variantId)->first();
            if ($cart)
            {
                $cart->quantity = $cart->quantity + 1;
                $cart->save();
                $this->info('سبد خرید','محصول به سبد خرید شما افزوده شد');
                $this->dispatch('openCartModal');
            }
        }





    }


    public function render()
    {
        return view('livewire.app.component.add-to-cart-card');

    }
}
