<div>

    <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4 mt-4">
        @foreach ($products as $product)
            @livewire('app.component.product-card',['product' => $product],key($product->id))
        @endforeach
    </div>

    <br/>
    <!-- Loading Spinner -->
    <div class="flex justify-center my-4" wire:loading>
        <svg class="animate-spin h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
        </svg>
        <span class="ml-2 text-gray-500">Loading...</span>
    </div>

    <!-- Placeholder while more products are loading -->
    <div class="text-center text-gray-500" wire:loading wire:target="loadMore">
        <p>Loading more products...</p>
    </div>
</div>

    <br/><br/>


    <script>
        document.addEventListener('scroll', function () {
            const {scrollTop, scrollHeight, clientHeight} = document.documentElement;

            // بررسی اینکه کاربر به انتهای صفحه نزدیک است
            if (scrollTop + clientHeight >= scrollHeight - 5) {
                Livewire.dispatch('loadMore'); // فراخوانی متد loadMore
            }
        });
    </script>


</div>
