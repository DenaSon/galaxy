<div class="container mx-auto">

    @include('livewire.app.shop.category-inc.top-menu')

    <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4 mt-4">
        @foreach($products as $product)
            @livewire('app.component.product-card', ['product' => $product], key($product->id))
        @endforeach
    </div>



    <!-- Centered Pagination -->
    <div class="mt-4 flex justify-center">
        {{ $products->links() }}
    </div>

</div>
