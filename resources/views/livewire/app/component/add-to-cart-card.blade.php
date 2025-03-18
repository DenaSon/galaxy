<div class="text-center mx-auto">
    <div class="rounded-md w-full  overflow-hidden mb-2 shadow-md  top-5">

        <x-card
            class="bg-gray-50 border border-b-2 h-auto p-1"
            progress-indicator separator="addToCart">
            <div class="stat">
                <div class="stat-figure text-gray-400">
                    <x-icon name="o-sparkles"/>
                </div>


                <div class="stat-value text-black text-center">{{ number_format($selectedVariant->price ?? 0) }}</div>
                <div class="stat-desc text-center">تومان</div>


                <x-hr/>
                <div class="w-full">

                    <x-group
                        label="انتخاب نوع"
                        :options="$product->variants()->orderBy('price')->select(['id', 'type'])->get()"
                        wire:model="selectedUser2"
                        option-value="id"
                        option-label="type"
                        class="[&:checked]:!btn-primary btn-sm"
                        wire:model.live="variant"/>

                </div>


                <div class="clear-both"></div>

                @include('livewire.app.shop.single-inc._addCartButton')

                <div class="clear-both"></div>


                @include('livewire.app.component.inc.add-to-cart-card-footer')


            </div>


        </x-card>


    </div>
</div>
