<x-collapse wire:model="showAttrs" separator class="bg-base-200">
    <x-slot:heading>ویژگی های محصول</x-slot:heading>
    <x-slot:content>
        <x-form>
            @foreach ($attrs as $index => $attribute)

                <x-input wire:key="{{ $attribute->id }}" label="{{ $attribute->name }}" icon="fas.edit"
                         wire:model.defer="attributeValues.{{ $attribute->id }}" inline/>

            @endforeach
            <x-slot:actions>
                <x-button icon="fas.save" wire:confirm="ویژگی ها برای محصول ثبت شوند؟"
                          wire:click="saveAttrs" label="ثبت" class="btn bg-blue-200"></x-button>
            </x-slot:actions>
        </x-form>






    </x-slot:content>
</x-collapse>
