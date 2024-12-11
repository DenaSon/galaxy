<div>

    <x-choices-offline
        label="محصول"
        icon="o-bars-arrow-up"
        wire:model.live="selectedProduct"
        :options="$product_list"
        option-value="id"
        option-label="name_sku"
        searchable
        no-result-text="محصول  وجود ندارد"
        single
    />
    @if($variants)

        <h2 class="text-lg font-bold mb-4">
            {{ \App\Models\Product::whereId($selectedProduct)?->first()?->name }}
        </h2>

        <div class="flex flex-wrap justify-start gap-2">
            @foreach($variants as $index => $variant)
                <x-card
                    separator
                    progress-indicator=""
                    subtitle="{{ $variant['type'] }}"
                    class="w-full sm:w-72 flex flex-col items-center border-b border-s-2 border-primary rounded-lg bg-gray-50 p-4"
                    wire:key="variant-{{ $variant['id'] }}"
                >
                    <label for="price-{{ $variant['id'] }}" class="block text-sm font-medium mb-2">قیمت</label>
                    <input
                        id="price-{{ $variant['id'] }}"
                        type="text"
                        wire:model="variants.{{ $index }}.price"
                        class="form-control input-sm w-full mb-3"
                    >

                    <label for="weight-{{ $variant['id'] }}" class="block text-sm font-medium mb-2">وزن</label>
                    <input
                        id="weight-{{ $variant['id'] }}"
                        type="text"
                        wire:model="variants.{{ $index }}.weight"
                        class="form-control input-sm w-full mb-3"
                    >

                    <x-button
                        wire:click="save({{ $index }})"
                        wire:confirm="اطلاعات برای نوع محصول ذخیره شود؟"
                        label="ذخیره"
                        class="w-full btn-xs"
                    />
                </x-card>
            @endforeach

        </div>

    @endif


</div>
