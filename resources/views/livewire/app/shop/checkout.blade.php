<div>

    @if(!$emptyFlag)
        @include('livewire.app.shop.checkout-inc.checkout-summary')
    @else
        <div class="container mx-auto h-full text-pretty text-primary">
        <h3 class="m-4 p-4 text-center ">
            <x-icon name="o-shopping-cart" class="w-72 h-72"/>
            <span class="badge badge-error text-white">
                محصولی در سبد خرید شما وجود ندارد
            </span>
        </h3>
        </div>
    @endif

</div>
