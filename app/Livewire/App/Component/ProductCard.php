<?php

namespace App\Livewire\App\Component;

use App\Models\Product;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Lazy;
use Livewire\Component;
use Mary\Traits\Toast;

#[Layout('components.layouts.app')]
#[Lazy]
class ProductCard extends Component
{
    use Toast;

    public Product $product;

    public function addFavorite(Product $product)
    {
        RateLimiter::attempt('addFavorite' . session()->id(), 20, function () {
            if (auth()->check()) {
                $user = auth()->user();
                $product = Product::find($this->product->id);

                if (!$user->favorites->contains($product->id))
                {

                    $user->favorites()->attach($product->id);
                    $this->info('محصول به لیست شما افزوده شد');
                }
                else
                {
                    $this->info('این محصول در لیست شما قرار دارد');
                }


            } else {
                $this->warning('ورود به حساب کاربری',
                    'برای افزودن به لیست علاقه مندی وارد حساب کاربری خود شوید',
                    'bottom-center',
                    'o-heart',
                    'bg-blue-500 text-base-100'
                );


            }

        }, 120);
    }



    public function removeFavorite(Product $product)
    {
        RateLimiter::attempt('addFavorite' . session()->id(), 20, function () {
            if (auth()->check()) {
                $user = auth()->user();
                $product = Product::find($this->product->id);

                if ($user->favorites->contains($product->id))
                {

                    $user->favorites()->detach($product->id);
                }


            } else {
                $this->warning('ورود به حساب کاربری',
                    'برای افزودن به لیست علاقه مندی وارد حساب کاربری خود شوید',
                    'bottom-center',
                    'o-heart',
                    'bg-blue-500 text-base-100'
                );


            }

        }, 120);
    }









    public function mount(Product $product)
    {



    }

    public function render()
    {
        return view('livewire.app.component.product-card')
            ->title('');
    }
}
