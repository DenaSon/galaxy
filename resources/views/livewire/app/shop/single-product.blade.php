<div>

    <div class="container mx-auto lg:px-2 2xl:px-0 mt-2">
        <div class="flex flex-col lg:flex-row gap-4 mt-4">

            @livewire('app.shop.single-inc.product-gallery',['product' => $product])

            <div class="w-full lg:w-4/6 h-auto">

                @livewire('app.shop.single-inc.product-detail',['product' => $product])


            </div>


        </div>
    </div>
    @livewire('app.component.cart-box')
    @livewire('app.component.address-modal')
</div>
