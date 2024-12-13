<div>

    <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4 mt-4">
        @foreach ($products as $product)
            @livewire('app.component.product-card',['product' => $product],key($product->id))
        @endforeach
    </div>

    <div>
        @if ($products->hasMorePages())
            <div
                wire:loading
                wire:target="loadMore"
                class="text-center text-gray-500 mt-4"
            >
                در حال بارگذاری...
            </div>
        @endif
    </div>


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
