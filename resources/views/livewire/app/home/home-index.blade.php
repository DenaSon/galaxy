<div class="container mx-auto">
        {{ getSetting('website:title') }}
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

</div>





