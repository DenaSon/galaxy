<div class="w-full lg:w-2/6 text-center">
<section class="container mx-auto" style="z-index: 0 !important;">

    <div class="swiper m-3">


        <div class="swiper-wrapper">

                    @foreach($images as $image)
                        <div class="swiper-slide">
                            <img src="{{ asset($image) }}" alt="{{ $product->name }}" height="480"/>
                        </div>
                    @endforeach

        </div>

        <div class="swiper-pagination"></div>


        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>

    </div>

</section>
</div>






{{--<div class="w-full lg:w-2/6 text-center">--}}
{{--    @push('styles')--}}
{{--        <script src="https://cdn.jsdelivr.net/npm/photoswipe@5.4.3/dist/umd/photoswipe.umd.min.js"></script>--}}
{{--        <script src="https://cdn.jsdelivr.net/npm/photoswipe@5.4.3/dist/umd/photoswipe-lightbox.umd.min.js"></script>--}}
{{--        <link href="https://cdn.jsdelivr.net/npm/photoswipe@5.4.3/dist/photoswipe.min.css" rel="stylesheet">--}}
{{--    @endpush--}}
{{--    <div class="carousel carousel-vertical rounded-box h-96 ">--}}
{{--        @foreach($images as $image)--}}
{{--            <div class="carousel-item h-full">--}}
{{--                <img src="{{ asset($image) }}" alt="{{ $product->name }}" height="480"/>--}}
{{--            </div>--}}
{{--        @endforeach--}}
{{--    </div>--}}


{{--    <x-image-gallery :images="$images" class="h-20 rounded-box w-70" with-arrows with-indicators/>--}}


{{--</div>--}}






