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

        <h2>{{ \App\Models\Product::whereId($selectedProduct)?->first()?->name }}</h2>

       @foreach($variants as $variant)

           <x-card separator progress-indicator="" subtitle="{{ $variant->type }}" class="w-96 flex flex-wrap items-center border-s rounded-lg bg-gray-200 m-3 p-1" wire:key="{{ $variant->id }}">


               <label for="price">قیمت</label>
               <input id="price" type="text" value="{{ $variant->price }}" class="form-control input-sm">

               <label for="weight">وزن</label>
               <input id="weight" type="text" value="{{ $variant->weight }}" class="form-control input-sm">

               <x-button wire:click.debounce="save({{$variant->id}})" label="ذخیره" />


           </x-card>

       @endforeach

    @endif



</div>
