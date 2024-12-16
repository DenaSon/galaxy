<div class="container mx-auto">
    @push('SEO')

        @include('livewire.app.home.inc._seo_schema')

    @endpush
    <div class="flex flex-col md:flex-row md:justify-center items-center space-y-2 md:space-y-0">
        <div class="w-full md:w-4/4 lg:w-3/4">
            @livewire('app.home.home-slider')
        </div>
        <div class="w-full md:w-1/4 hidden lg:block">
            @include('livewire.app.home.home-banner')
        </div>
    </div>

    @livewire('app.home.visual-category-list')

    <h1 class="text-center mt-5 mb-6">
        {{ getSetting('website_title') }}
    </h1>
    <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4 mt-4">
        @foreach($products as $product)
            @livewire('app.component.product-card', ['product' => $product], key($product->id))
        @endforeach
    </div>

    <div class="container mx-auto lg:px-4 2xl:px-0 mt-2 overflow-hidden">
        <div
            class="px-2 lg:px-3  bg-white lg:rounded-large border-1 border-gradient-to-r from-blue-500 to-green-500 rounded-lg shadow-lg p-4">
            <div class="flex items-center justify-center py-3 lg:py-4 mb-2">

                <h3 class="text-h3"> خواندنی های دناپکس </h3>
            </div>

            <div class="swiperBlog " id="spr">
                <div class="swiper-wrapper">

                    @foreach($blogs as $blog)
                        <div class="swiper-slide">
                            @livewire('app.component.blog-card',['blog'=>$blog])
                        </div>

                    @endforeach


                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>


            </div>


        </div>


    </div>


</div>







