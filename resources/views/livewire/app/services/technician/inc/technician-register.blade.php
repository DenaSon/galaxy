
    <x-card title="خدمات ویژه تکنسین‌ها" subtitle="دریافت هوشمند درخواست‌های تعمیر و سرویس آسانسور در استان شما" shadow>
        <p class="text-justify">
            تکنسین‌های لیفت‌پال می‌توانند درخواست‌های تعمیر، سرویس و اعلام خرابی آسانسورها را به‌صورت هوشمند و بر اساس استان محل فعالیت خود دریافت کنند. این سیستم امکان دسترسی سریع به مشتریان، مدیریت درخواست‌ها و افزایش فرصت‌های شغلی را برای تکنسین‌ها فراهم می‌کند. با لیفت‌پال،
            بدون واسطه و در کمترین زمان، پروژه‌های جدید دریافت کنید و خدمات حرفه‌ای خود را گسترش دهید.

        </p>
    </x-card>


    <div class="text-center mx-auto">

        <x-steps wire:model="step" class="border my-5 p-5">

            @include('livewire.app.services.technician.inc.steps')

        </x-steps>




        <x-button spinner label="مرحله قبل" wire:click="prev" />
        <x-button spinner label="مرحله بعد" wire:click="next" />

        <x-hr/>

    </div>



