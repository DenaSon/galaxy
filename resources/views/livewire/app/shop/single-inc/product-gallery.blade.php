<div class="w-full lg:w-2/6 text-center">
        @push('styles')
            <script src="https://cdn.jsdelivr.net/npm/photoswipe@5.4.3/dist/umd/photoswipe.umd.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/photoswipe@5.4.3/dist/umd/photoswipe-lightbox.umd.min.js"></script>
            <link href="https://cdn.jsdelivr.net/npm/photoswipe@5.4.3/dist/photoswipe.min.css" rel="stylesheet">
        @endpush
    <section class="container mx-auto" style="z-index: 0 !important;">

        <div class="swiper m-3">


            <div class="swiper-wrapper" style="z-index: 0 !important;">

                        @foreach($images as $image)
                            <div class="swiper-slide">
                                <img src="{{ asset($image) }}" alt="{{ $product->name }}" height="380"/>
                            </div>
                        @endforeach

            </div>

            <div class="swiper-pagination"></div>


            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

        </div>

    </section>
        <x-image-gallery class="mt-3" :images="$images" class="h-20 rounded-box w-70" with-arrows with-indicators/>

    <style>
        .swiper {

            margin-bottom: 10px;
            width: 368px;
            height: 386px;
            position: relative;
            z-index: 0 !important;
        }

        .swiper-slide
        {
            border-bottom-right-radius: 5px;
            border-bottom-left-radius: 5px;
        }
    </style>
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




{{--</div>--}}






