<div class="container mx-auto lg:px-4 2xl:px-0 mt-2 overflow-hidden shadow-sm">
    <div
        class="px-2 lg:px-3  bg-white lg:rounded-large border-1 border-gradient-to-r from-blue-500 to-green-500 rounded-lg p-4">
        <div class="flex items-center justify-center py-3 lg:py-4 mb-2">

            <h3 class="text-h3"> خواندنی های دناپکس </h3>
        </div>

        <div class="swiperBlog" id="spr">
            <div class="swiper-wrapper">

                @foreach($blogs as $blog)
                    <div class="swiper-slide">
                        @livewire('app.component.blog-card',['blog'=>$blog])
                    </div>

                @endforeach


            </div>

        </div>


    </div>


    <style>

        .swiper-wrapper {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>

</div>
