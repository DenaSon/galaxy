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

    <div class="text-center mt-5 mb-6">
        تازه های دناپکس
    </div>
    <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4 mt-4">
        @foreach($products as $product)
            @livewire('app.component.product-card', ['product' => $product], key($product->id))
        @endforeach
    </div>

    <div class="container mx-auto lg:px-4 2xl:px-0 mt-2">
        <div
            class="px-2 lg:px-3  bg-white lg:rounded-large border-1 border-gradient-to-r from-blue-500 to-green-500 rounded-lg shadow-lg p-4">
            <div class="flex items-center justify-center py-3 lg:py-4 mb-2">

                <h3 class="text-h3"> خواندنی های دناپکس </h3>


            </div>
            <div class="grid grid-cols-3 md:grid-cols-6 lg:grid-cols-6 xl:grid-cols-9">
                @foreach($blogs as $blog)

                    @livewire('app.component.blog-card', ['blog' => $blog], key($blog->id))

                @endforeach
            </div>
        </div>


    </div>


</div>







