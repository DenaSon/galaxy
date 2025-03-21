<section class="container mx-auto  sm:block md:hidden" style="z-index: 0 !important;">

    <div class="swiper m-3">


        <div class="swiper-wrapper">

            @foreach($products as $product)

                <div class="swiper-slide">

                    @livewire('app.component.product-card',['product' => $product],key($product->id))

                </div>

            @endforeach

        </div>

        <div class="swiper-pagination"></div>


        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>

    </div>
    <style>
        .swiper {
            position: relative;
            z-index: 0 !important;
        }
    </style>
</section>
