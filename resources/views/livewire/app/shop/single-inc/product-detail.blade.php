<article>
    <div class="flex gap-4 h-full">

        <div class="flex-1  h-16 ">

            <div class="breadcrumbs text-xs">
                <ul class="text-primary" itemscope itemtype="https://schema.org/BreadcrumbList">
                    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <a wire:navigate
                           href="{{ singleCategoryUrl($product?->categories?->first()?->id, $product?->categories?->first()?->name) }}"
                           itemprop="item">
                            <span itemprop="name">{{ $product?->categories?->first()?->name ?? '' }}</span>
                        </a>
                        <meta itemprop="position" content="1"/>
                    </li>
                    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <a href="{{ request()->url() }}" itemprop="item">
                            <span itemprop="name">{{ $product?->name ?? '' }}</span>
                        </a>
                        <meta itemprop="position" content="2"/>
                    </li>
                </ul>
            </div>
            <h1 class="font-black text-lg"><a wire:navigate class="decoration-white"
                                              href="{{ singleProductUrl($product->id,$product->name)}}"> {{ $product->name }} </a>
            </h1>
        </div>

        <div class="flex-[0.3] h-12 hidden sm:block">

            <x-theme-toggle class="btn btn-circle" />


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


        <div class="flex w-full sm:w-1/3 order-1 md:order-2">
            @livewire('app.component.add-to-cart-card',['product' => $product])
        </div>
    </div>


    <div class="flex flex-col gap-1 h-auto mt-4">

        @if($product->related_article_id != null)
            <x-collapse wire:model="show" separator class="bg-base-50 mt-5">
                <x-slot:heading>اطلاعات مرتبط</x-slot:heading>
                <x-slot:content>
                    @livewire('app.shop.related-blog',['product' => $product])
                </x-slot:content>
            </x-collapse>
        @else
            <x-collapse wire:model="show" separator class="bg-base-50 mt-5">
                <x-slot:heading>
                    اطلاعات مرتبط
                    @if($product->wiki != null)
                        با {{ $product->wiki }}
                    @endif
                </x-slot:heading>
                <x-slot:content>
                    @if($product->wiki == null)
                        <i> اطلاعات مرتبط بیشتری وجود ندارد </i>
                    @else
                        <div class="single-blog">
                            <p>
                                {{ getWikipediaInfo($product->wiki) }}
                            </p>
                        </div>
                        <br/>
                        <span class="font-thin text-xs text-gray-50 mt-2 badge badge-warning">
                     استخراج شده از :  <a href="https://fa.wikipedia.org/" target="_blank" rel="noopener">ویکی پدیا </a>

                    </span>
                    @endif
                </x-slot:content>
            </x-collapse>

        @endif

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
