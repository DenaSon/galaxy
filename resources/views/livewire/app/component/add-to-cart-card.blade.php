<div class="text-center mx-auto">
    <div class="rounded-md w-full  overflow-hidden mb-2 shadow-md sticky top-5">

        <x-card
            class="bg-gray-50 border border-b-2 h-auto p-1"
            progress-indicator separator="addToCart">
            <div class="stat">
                <div class="stat-figure text-gray-400">
                    <x-icon name="o-sparkles"/>
                </div>

                @if($product->variants->count() == 1)
                    <div
                        class="stat-value text-black text-center">{{ number_format($defaultVariant->price ?? 0) }}</div>
                    <div class="stat-desc text-center">تومان</div>
                @else

                    <div class="stat-value text-black text-center">{{ number_format($livePrice ?? 0) }}</div>
                    <div class="stat-desc text-center">تومان</div>


                    <x-menu-separator/>
                    <div class=" w-full">
                        <x-select
                            class="select-sm"
                            :options="$variantList"
                            option-value="id"
                            option-label="type"
                            wire:model.live.debounce.2ms="variant"/>


                    </div>

                @endif

                <div class="clear-both"></div>

                @include('livewire.app.shop.single-inc._addCartButton')

                <div class="clear-both"></div>





            </div>


        </x-card>


    </div>
</div>
