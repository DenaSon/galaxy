<div>
    <x-modal wire:model="addressModal" class="backdrop-blur">
        <div class="mb-2"></div>

        <x-select inline label="انتخاب استان" icon="o-user" :options="$state_list" wire:model="state" class="mb-2" />

        <x-input inline label=" شهر" wire:model="city" class="mb-3"/>
        <x-input inline label="کد پستی" wire:model="postal_code" class="mb-3"/>
        <x-textarea inline label="آدرس دقیق پستی"/>

        <x-slot:actions>
            <x-button label="ثبت آدرس" class="btn-primary"/>
        </x-slot:actions>

    </x-modal>


        <x-button label="ثبت آدرس" @click="$wire.addressModal = true"/>



</div>
