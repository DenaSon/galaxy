<x-step step="1" text="ورد به حساب کاربری">

  @if(!Auth::check())
        <p class="m-2">
            شماره تلفن خود را تایید کنید
        </p>
        <br/>

        <x-button @click="$wire.loginModal = true" label="تایید شماره تلفن" class="btn-info"/>
    @else

        <x-alert icon="o-phone" class="alert-success">
           شماره تلفن شما تایید شده است
        </x-alert>

  @endif

</x-step>
<x-step step="2" text="ثبت اطلاعات">

   @if(Auth::user()->addresses()->count() == 0)
        <p class="m-2">
            اطلاعات آدرس خود را ثبت کنید
        </p>
        <br/>

        <x-button spinner wire:click="register_address" label="ثبت آدرس" class="btn-warning"/>
    @else

        <x-alert icon="o-phone" class="alert-success">
           آدرس شما ثبت شده است
        </x-alert>
   @endif

</x-step>
<x-step step="3" text="فعال سازی حساب تکنسین" class=" border-success">

    <p class="m-2">
        با فعال‌سازی حساب کاربری تکنسین، می‌توانید درخواست‌های تعمیر و سرویس آسانسور را دریافت کنید. لطفاً قبل از فعال‌سازی، قوانین و شرایط همکاری را مطالعه نمایید.
    </p>
    <br/>

    <x-button spinner wire:click="activeTechnician" label="درخواست فعال سازی حساب" class="btn-success"/>

</x-step>
