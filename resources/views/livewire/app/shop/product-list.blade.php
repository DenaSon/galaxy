<div class="container mx-auto">
    @push('SEO')
        @include('livewire.app.shop.category-inc.seo')
    @endpush
    @include('livewire.app.shop.category-inc.top-menu')




    <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4 mt-4">
        @foreach($products as $product)
            @livewire('app.component.product-card', ['product' => $product], key($product->id))
        @endforeach
    </div>


        <div class="mockup-browser border-base-300 border mt-4">
            <div class="mockup-browser-toolbar text-right">
                <h1 class="justify-start text-right mx-auto">
                 خرید    {{ $category->name }}
                </h1>
            </div>
            <div class="border-base-300 flex justify-start border-t px-2 py-4  text-pretty">
                {{ $category->description }}
            </div>
        </div>





    <!-- Centered Pagination -->
    <div class="mt-4 flex justify-center">
        {{ $products->links() }}
    </div>

</div>
