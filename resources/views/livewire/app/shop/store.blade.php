<div class="container mx-auto">


    <x-nav class="h-24">

        <x-slot:brand>
            <div class="flex w-full">
                <!-- بخش دسته‌ها -->
                <div class="flex space-x-4">
                    <x-dropdown label="دسته‌ها" class="bg-gray-50 text-xs font-thin">
                        @foreach ($categories as $category)
                            <x-menu-item @click.stop="">
                                <x-checkbox
                                    wire:model.live="selectedCategories"
                                    value="{{ $category->id }}"
                                    label="{{ $category->name }}"/>
                            </x-menu-item>
                        @endforeach
                    </x-dropdown>
                </div>

            </div>
        </x-slot:brand>

        <x-slot:actions>


            <div class="flex ms-4">
                <x-input wire:model.live.debounce="searchTerm" icon="o-magnifying-glass" placeholder="جستجو..."
                         inline=""/>
            </div>
        </x-slot:actions>



    </x-nav>

    <x-progress class="progress-primary h-0.5" indeterminate wire:loading/>

    <h1> لیست محصولات  {{ getSetting('website_title') }} </h1>

    <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4 mt-4">




    @foreach ($products as $product)
            @livewire('app.component.product-card',['product' => $product],key($product->id))
        @endforeach
    </div>


    <script>
        document.addEventListener('scroll', function () {
            const {scrollTop, scrollHeight, clientHeight} = document.documentElement;


            if (scrollTop + clientHeight >= scrollHeight - 5) {
                Livewire.dispatch('loadMore');
            }
        });
    </script>


</div>
