<div>
    <x-modal wire:model="addressModal" class="backdrop-blur">
        <div class="mb-2 text-center text-black"> ثبت آدرس </div>
        <x-hr/>

        <div class="grid grid-cols-2 gap-4">
            <x-input
                clearable
                inline
                label="نام"
                wire:model.live.debounce.150ms="first_name"
                class="mb-2"
            />
            <x-input
                clearable
                inline
                label="نام خانوادگی"
                wire:model.live.debounce.150ms="last_name"
                class="mb-2"
            />
        </div>

        <x-select
            wire:dirty.attr="disabled"
            inline
            placeholder="انتخاب"
            label="انتخاب استان"
            icon="o-user"
            :options="$province_list"
            wire:model.live.debounce.2ms="province"
            class="mb-2"
        />

        <x-select inline label="انتخاب شهر" icon="o-user" :options="$city_list" wire:model="city" class="mb-2" />

        <x-input placeholder="کد پستی" class="input-sm p-4 mt-2 mb-2" wire:model="postal_code" type="number"/>
        <x-textarea inline label="آدرس دقیق پستی" wire:model="address_line"/>

        <x-slot:actions>
            <x-button icon="o-home-modern" spinner="save" wire:click.debounce.250ms="save" label="ثبت آدرس" class="btn-primary"/>
        </x-slot:actions>

    </x-modal>





</div>
