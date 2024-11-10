<x-collapse wire:model="showVariants" separator class="bg-base-200">
    <x-slot:heading>انواع + قیمت</x-slot:heading>
    <x-slot:content>
        <x-form>

            <x-menu-separator/>


            @foreach ($variants as $index => $variant)
                <div class="flex gap-2 mb-2">
                    <x-input
                        wire:model.defer="variants.{{ $index }}.type"
                        placeholder="نام نوع"
                        class="w-2/2"
                        required
                    />

                    <x-input
                        wire:model.defer="variants.{{ $index }}.price"
                        placeholder="قیمت"

                        step="1000"
                        class="w-2/2"
                        required
                    />

                    <x-button
                        spinner
                        icon="o-trash"
                        wire:click="removeVariant({{ $index }})"
                        class="btn bg-red-200"
                        label=""
                    />
                </div>
            @endforeach


            <x-menu-separator/>


            @if(!empty($variant_list))
                <ul class="bg-base-200 rounded-lg shadow-md p-4 w-64 space-y-2">
                    @foreach($variant_list as $var)
                        <li class="flex items-center justify-between p-2 bg-white rounded-md shadow-sm">
                            <div>
                                <span class="text-gray-800 font-semibold">{{ $var->type }}</span> -
                                <span class="ml-2 text-sm text-blue-500 font-medium">قیمت: {{ number_format($var->price)  }} تومان</span>
                            </div>
                            <x-button icon="o-trash" class="btn-xs"
                                      wire:click="deleteVariant({{ $var->id }})"></x-button>
                        </li>
                    @endforeach
                </ul>
            @endif


            <x-slot:actions>
                <x-button spinner icon="fas.save" wire:confirm="نوع جدید ذخیره شود؟"
                          wire:click="saveVariants" label="ثبت" class="btn bg-blue-200"></x-button>
            </x-slot:actions>


        </x-form>

    </x-slot:content>
</x-collapse>
