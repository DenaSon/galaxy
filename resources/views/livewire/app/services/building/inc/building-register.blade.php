<div class="container mx-auto">
    <x-card separator progress-indicator title="ثبت ساختمان" subtitle="                مدیران و صاحبان ساختمان می‌توانند با ثبت اطلاعات ساختمان خود در لیفت‌پال، درخواست‌های تعمیر و سرویس آسانسور را به تکنسین‌های معتبر ارسال کنند.
" shadow>


        @php
            $isNameEmpty = optional(Auth::user())->first_name == null && optional(Auth::user())->last_name == null;
        @endphp

        <div class="grid grid-cols-2 gap-6 mb-4">
            <x-input clearable inline label="نام" wire:model.live.debounce.150ms="first_name" class="mb-2"
                     :readonly="!$isNameEmpty" :disabled="!$isNameEmpty"/>
            <x-input clearable inline label="نام خانوادگی" wire:model.live.debounce.150ms="last_name" class="mb-2"
                     :readonly="!$isNameEmpty" :disabled="!$isNameEmpty"/>
        </div>

        <div class="grid grid-cols-2 gap-6 mb-4">
            <x-input clearable inline label="نام ساختمان" wire:model="builder_name"/>
            <x-input type="number" clearable inline label="تعداد طبقات" wire:model="floor"/>
        </div>

        <div class="grid grid-cols-2 gap-6 mb-4">
            <x-input type="number" clearable inline label="شماره تلفن اضطراری" wire:model="emergency_contact"/>
            <x-input type="number" clearable inline label="پلاک" wire:model="identify"/>
        </div>

        <b>انتخاب آدرس روی نقشه</b>
        <div wire:ignore id="map" class="map shadow mb-4"></div>

        <x-input disabled wire:model="address" label="آدرس ساختمان"/>

        <x-input hidden id="latitude" wire:model="latitude"/>
        <x-input hidden id="longitude" wire:model="longitude"/>


        <x-slot:actions>

            <x-button label="ثبت ساختمان" class="btn-primary w-64" type="submit" spinner="save"/>
        </x-slot:actions>

    </x-card>


</div>
