<div>

    <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4 mt-4">
        @foreach ($products as $product)
            @livewire('app.component.product-card',['product' => $product],key($product->id))
        @endforeach
    </div>

    <br/>

    <br/><br/>


       <div class="text-center">
           <div class="font-black text-sm">درحال بارگذاری...</div>
       </div>


    <br/><br/>


    <script>
        document.addEventListener('scroll', function () {
            const {scrollTop, scrollHeight, clientHeight} = document.documentElement;


            if (scrollTop + clientHeight >= scrollHeight - 5) {
                Livewire.dispatch('loadMore');
            }
        });
    </script>


</div>
