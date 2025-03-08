@php
    $elevatorTypes = [
       ['id' => 'passenger',  'name' => 'مسافربری'],
       ['id' => 'freight',    'name' => 'باری'],
       ['id' => 'service',    'name' => 'خدماتی'],
       ['id' => 'hospital',   'name' => 'بیمارستانی'],
       ['id' => 'panoramic',  'name' => 'پانوراما (شیشه‌ای)'],
       ['id' => 'dumbwaiter', 'name' => 'غذابر'],
       ['id' => 'home',       'name' => 'خانگی'],
       ['id' => 'vehicle',    'name' => 'خودرویی'],
       ['id' => 'other',      'name' => 'سایر'],
   ];

    $status =
     [
        ['id' => 'active' , 'name' =>'فعال'],
        ['id' => 'inactive' , 'name' => 'غیرفعال']

    ];


@endphp
<div>

    <x-modal wire:model="addElevatorModal" title="افزودن آسانسور" subtitle="افزودن آسانسور به ساختمان" separator>

        <x-form wire:submit="save">

            <x-select inline label="نوع آسانسور" icon="o-squares-2x2" :options="$elevatorTypes" wire:model="type"
                      placeholder="انتخاب نوع"/>

            <x-input type="number" inline wire:model="national_code" label="شناسه ملی"/>

            <x-input type="number" inline wire:model="capacity" label="ظرفیت"/>

            <x-select placeholder="وضعیت آسانسور" inline label="وضعیت" icon="o-arrows-up-down" :options="$status"
                      wire:model="status"/>


            <x-slot:actions>
                <x-button label="لغو" @click="$wire.addElevatorModal = false"/>
                <x-button type="submit" label="ثبت آسانسور" class="btn-primary"/>
            </x-slot:actions>
        </x-form>
    </x-modal>

    <x-button @click="$wire.addElevatorModal = true" label="افزودن آسانسور" responsive icon="o-plus" class="btn-info"/>

</div>
