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


        <div x-data="{
    postalCode: '',
    updateToEnglish(event) {
        const persianNumbers = ['۰','۱','۲','۳','۴','۵','۶','۷','۸','۹'];
        const englishNumbers = ['0','1','2','3','4','5','6','7','8','9'];

        let value = event.target.value;

        // Replace Persian numbers with English numbers
        for (let i = 0; i < persianNumbers.length; i++) {
            value = value.replaceAll(persianNumbers[i], englishNumbers[i]);
        }

        this.postalCode = value; // Update the Alpine.js data
        event.target.value = value; // Update the input field value
    }
}">
            <x-input
                wire:model="postal_code"
                placeholder="کد پستی"
                class="input-sm p-2 mt-2 mb-2"
                type="text"
                @input="updateToEnglish($event)"
            />

            <!-- Label to display the input value -->
            <label class="text-gray-700 text-sm mt-2 block">
                مقدار وارد شده: <span x-text="postalCode"></span>
            </label>
        </div>



        <x-textarea inline label="آدرس دقیق پستی" wire:model="address_line"/>

        <x-slot:actions>
            <x-button icon="o-home-modern" spinner="save" wire:click.debounce.250ms="save" label="ثبت آدرس" class="btn-primary"/>
        </x-slot:actions>

    </x-modal>





</div>
