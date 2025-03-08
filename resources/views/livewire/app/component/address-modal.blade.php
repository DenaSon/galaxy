<div>
    <x-modal wire:model="addressModal" class="backdrop-blur-none" style="z-index: 200000">
        <div class="mb-2 text-center text-black">
            ثبت آدرس
            &nbsp;
            <x-button icon="o-question-mark-circle" class="btn-circle btn-xs text-yellow-500" wire:click="showTip"/>
        </div>

        @if($tipText)
            <x-alert shadow dismissible title="" class="bg-violet-400 text-violet-50">
                <small class="p-2">هنگام وارد کردن کد پستی صفحه کلید خود را در حالت انگلیسی قرار دهید</small>
            </x-alert>
        @endif


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
            class="mb-1"
        />

        <x-select inline label="انتخاب شهر" icon="o-user" :options="$city_list" wire:model="city" class="mb-2"/>

        <x-input money type="number" inline label="کد پستی" clearable wire:model.live="postal_code" class="mb-1"/>

        <x-textarea inline label="آدرس دقیق پستی" wire:model="address_line"/>

        <x-slot:actions>
            <x-button icon="o-home-modern" spinner="save" wire:click.debounce.250ms="save" label="ثبت آدرس"
                      class="btn-primary"/>
        </x-slot:actions>

    </x-modal>


</div>
