<article>
    <div class="flex gap-4 h-full">

        <div class="flex-1  h-16 ">

            <div class="breadcrumbs text-xs">
                <ul class="text-primary">

                    <li><a wire:navigate
                           href="{{ singleCategoryUrl($product?->categories?->first()?->id,$product?->categories?->first()?->name) }}">{{ $product?->categories?->first()?->name ?? '' }}</a>
                    </li>

                </ul>
            </div>
            <h1 class=" font-black text-lg"><a wire:navigate class="decoration-white"
                                               href="{{ singleProductUrl($product->id,$product->name)}}"> {{ $product->name }} </a>
            </h1>
        </div>

        <div class="flex-[0.5] h-12 hidden sm:block">
            <div class="stats shadow">
                <div class="stat">
                    <div class="stat-figure text-secondary">
                        <x-icon name="o-chart-bar" class="text-primary w-8 h-8"></x-icon>
                    </div>
                    <div class="stat-title text-sm">بازدید</div>
                    <div class="stat-value text-lg">{{ $product->views }}</div>
                    <div class="stat-desc">از {{ jdate($product->created_at)->ago() }}</div>
                </div>
            </div>
        </div>


    </div>

    <div class="flex gap-2 h-7 mt-2">

        <div class="flex-[0.8]  rounded-md ">

            <x-icon name="o-chat-bubble-bottom-center-text" class="w-5 h-5 text-violet-300 text-xs"
                    label="{{ $product->comments->count() }} دیدگاه"/>


            <x-rating title="امتیاز" disabled wire:model="ranking" class="p-0 m-1 bg-yellow-400  opacity-60" total="5"/>


        </div>

    </div>

    <x-hr class="m-2"/>
    <div class="flex sm:flex-nowrap flex-wrap gap-4 h-auto mt-4">


        <div class="flex w-full sm:w-2/3 order-2 md:order-1">

            @include('livewire.app.shop.single-inc._productDetails')

        </div>


        <div class="flex w-full sm:w-1/3 order-1 md:order-2 relative">
            @livewire('app.component.add-to-cart-card',['product' => $product])
        </div>
    </div>


    <div class="flex flex-col gap-1 h-auto mt-4">

        <div class="w-full rounded-md mt-4">
            <x-tabs wire:model="selectedTab" class="mb-5">

                <x-tab name="productFeature" icon="o-queue-list" label="ویژگی‌ها">
                    @include('livewire.app.shop.single-inc._product-features')
                </x-tab>

                <x-tab name="productComment" label="دیدگاه‌ها">
                    <div>@include('livewire.app.shop.single-inc._product-comments')</div>
                </x-tab>

                <x-tab name="productSendComment" label="ارسال دیدگاه">
                    @livewire('app.shop.single-inc.send-comment-form',['product' => $product],key($product->id))
                </x-tab>

            </x-tabs>
        </div>

    </div>


</article>
