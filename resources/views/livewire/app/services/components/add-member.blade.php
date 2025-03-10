<div>

    <x-modal wire:model="addMemberModal" title="افزودن عضو" subtitle="افزودن عضو به ساختمان">

        <x-form wire:submit="save">


            <x-input type="text" wire:model="name" label="نام و نام خانوادگی" inline/>

            <x-input type="text" wire:model="phone" label="تلفن" inline/>

            <x-input type="number" wire:model="floor" label="طبقه" inline/>

            <x-input type="number" wire:model="unit" label="واحد" inline/>


            <x-slot:actions>
                <x-button label="لغو" @click="$wire.addMemberModal = false"/>
                <x-button spinner="save" type="submit" label="ثبت عضو" class="btn-success"/>
            </x-slot:actions>
        </x-form>
    </x-modal>

    <x-button @click="$wire.addMemberModal = true" label="افزودن عضو" responsive icon="o-plus"
              class="btn-success text-white  btn-sm"/>

</div>
