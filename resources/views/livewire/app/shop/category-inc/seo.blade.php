<div class="container mx-auto">
    <!-- SEO Meta Tags -->
    @push('SEO')
        <meta name="description" content="{{ $category->description }}">
        <meta name="keywords" content="{{ implode(',', $category->tags) }}">
        <title>خرید {{ $category->name }} - بهترین {{ $category->name }} ها | دناپکس</title>
    @endpush

    <!-- Header and Navigation -->
    @include('livewire.app.shop.category-inc.top-menu')

    <!-- Main Content -->
    <main>
        <section class="category-description">
            <header class="category-header">
                <h1 class="text-right">{{ $category->name }}</h1>
            </header>

            <!-- Description Section -->
            <div class="category-description-text">
                <p>{{ $category->description }}</p>
            </div>
        </section>

        <!-- Products Grid -->
        <section class="products-list">
            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4 mt-4">
                @foreach($products as $product)
                    @livewire('app.component.product-card', ['product' => $product], key($product->id))
                @endforeach
            </div>
        </section>

        <!-- Pagination -->
        <div class="pagination mt-4 flex justify-center">
            {{ $products->links() }}
        </div>
    </main>
</div>
