<div>
<div class="flex gap-4 h-full">

    <div class="flex-1  h-16 ">

        <div class="breadcrumbs text-xs">
            <ul class="text-primary">

                <li><a wire:navigate href="{{ route('home.index-home') }}">{{ $product?->categories?->first()?->name ?? '' }}</a></li>
                <li><a wire:navigate href="{{ route('home.index-home') }}">{{ $product?->categories?->first()?->children?->first()?->name ?? '' }}</a></li>

            </ul>
        </div>
       <h1 class=" font-black text-lg"><a wire:navigate class="decoration-white" href="{{ singleProductUrl($product->id,$product->name)}}"> {{ $product->name }} </a> </h1>
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

        <div class="flex-[0.5]  rounded-md ">
            <x-icon name="o-chat-bubble-bottom-center-text" class="w-5 h-5 text-violet-300 text-xs" label="{{ $product->comments->count() }} دیدگاه" />

        </div>

    </div>

<x-hr/>
    <div class="flex gap-4 h-auto mt-4">

        <p class="text-right font-thin text-sm  flex-[1] rounded-md leading-[2.3]">

            {!! $product->details !!}

        </p>

    </div>


    <div class="flex gap-4 h-auto mt-4">

        <div class="flex-[1] rounded-md mt-4">
            <x-tabs wire:model="selectedTab">

                <x-tab name="productFeature" icon="o-queue-list" label="  ویژگی‌ها">


                    <div>Users</div>
                </x-tab>



                <x-tab name="productComment" label="دیدگاه‌ها" icon="o-chat-bubble-bottom-center-text">
                    <div>Tricks</div>
                </x-tab>


                <x-tab name="productSendComment" label="ارسال دیدگاه" icon="o-paper-airplane">
                    <div>Musics</div>
                </x-tab>


            </x-tabs>


        </div>

    </div>






</div>
