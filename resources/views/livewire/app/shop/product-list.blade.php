<div class="container mx-auto">
    @push('SEO')
        @include('livewire.app.shop.category-inc.seo')
    @endpush
    @include('livewire.app.shop.category-inc.top-menu')





        <main>
    <section class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4 mt-4">
        @foreach($products as $product)
            @livewire('app.component.product-card', ['product' => $product], key($product->id))
        @endforeach
    </section>






        <section  class="mockup-browser border-base-300 border mt-2 mb-2">
            <header class="mockup-browser-toolbar text-right">
                <h1 class="justify-start text-right mx-auto">
                    خرید    {{ $category->name }}
                </h1>
            </header>
            <p class="border-base-300 flex text-justify justify-start border-t px-4 py-4 leading-8 text-gray-500 text-sm">
                {{ $category->description }}
            </p>
        </section>


    <!-- Centered Pagination -->
    <div class="mt-4 flex justify-center">
        {{ $products->links() }}
    </div>
        </main>
</div>
