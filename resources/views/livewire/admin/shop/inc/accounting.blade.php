<div wire:ignore>

    <x-collapse wire:model="showAccounting" separator class="bg-base-200">
        <x-slot:heading>  حسابداری </x-slot:heading>
        <x-slot:content>
            <x-form>

                <x-input wire:model="purchase_price" label="قیمت خرید" inline></x-input>
                <x-input wire:model="sale_price" label="قیمت فروش" inline></x-input>
                <x-input wire:model="inventory" label="موجودی" inline></x-input>
                <x-input wire:model="location" label="موقعیت" inline></x-input>


                <x-slot:actions>
                    <x-button icon="fas.save" wire:confirm="اطلاعات حسابداری ثبت شوند؟"
                              wire:click="saveAccounting" label="ثبت" class="btn bg-blue-200"></x-button>
                </x-slot:actions>
            </x-form>

        </x-slot:content>
    </x-collapse>


</div>
