<x-drawer wire:model="showHelp" class="w-11/12 lg:w-1/5" right>

    <x-header title="راهنما" subtitle="راهنما مدیریت ساختمان">
        <x-slot:middle class="!justify-end">

        </x-slot:middle>
        <x-slot:actions>
            <x-button icon="o-x-mark" class="btn btn-outline btn-error btn-xs font-normal" label=""
                      @click="$wire.showHelp = false"/>
        </x-slot:actions>
    </x-header>

    <hr class="m-2"/>


    <x-alert class="alert mb-3" title="مدیریت ساختمان"
             description="در بخش مدیریت ساختمان، کاربران می‌توانند آسانسورها و اعضای ساختمان خود را ثبت و مدیریت کنند. این بخش امکان مشاهده اطلاعات، ارسال اعلان‌ها و گزارش خرابی آسانسور را نیز فراهم می‌کند.
" icon="o-information-circle"
             dismissible/>


    <x-alert class="alert-warning mb-3" title="اطلاعات ساختمان"
             description="نام ساختمان و آدرس آن در بالای صفحه نمایش داده می‌شود." icon="o-information-circle"
             dismissible/>

    <x-alert class="alert-info mb-3" title=" آسانسورهای ساختمان"
             description="در این بخش می‌توانید آسانسورهای ساختمان را ثبت، مدیریت و اطلاعات آن‌ها را مشاهده کنید. همچنین امکان دریافت اعلان‌ها و اعلام خرابی به تکنسین‌ها از این قسمت فراهم شده است."
             icon="o-information-circle" dismissible/>

    <x-alert class="alert-success mb-3" title="اعضای ساختمان"
             description="در این بخش می‌توانید اعضای ساختمان را ثبت، مدیریت و اطلاعات آن‌ها را مشاهده کنید. همچنین امکان ویرایش، حذف و برقراری تماس مستقیم با اعضا فراهم شده است."
             icon="o-information-circle"
             dismissible/>

    @php
        $progress = 0;

        if ($building) {
            $progress = 10;
        }

        if ($building && $elevators && $members) {
            $progress = 100;
        } elseif ($building && ($elevators || $members)) {
            $progress = 50;
        }
    @endphp
    <span class="text-justify font-thin"> درصد تکمیل</span>

    <br/>
    <x-progress-radial value="{{$progress}}" class="mt-4 mb-12 text-warning border-warning"/>

    <hr class="mb-10">
</x-drawer>

<x-button responsive icon="o-question-mark-circle" label="راهنما" wire:click="$toggle('showHelp')"
          class="btn-info btn-sm text-white font-normal"/>







