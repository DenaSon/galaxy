<div>

    <x-modal wire:model="loginModal" class="backdrop-blur" box-class="w-96">
        <div class="mb-5"></div>
        <x-input wire:model="phoneNumber" label="شماره تلفن" inline></x-input>

        <div class="flex items-center justify-center">


            <x-button spinner="sendVerifySms" icon="o-arrow-left-start-on-rectangle" class="btn-primary w-2/4 mt-3"
                      label="ورود" wire:click="sendVerifySms"/>

        </div>

    </x-modal>


    <x-modal wire:model="verifyModal" class="modal-middle" dir="ltr">
        <div class="mb-2"></div>
        <div class="flex flex-col items-center justify-center">

            <x-badge class="mb-3 bg-violet-100" value="کد ارسال شده به تلفن همراه"/>

            <x-pin wire:model="pin" size="4" numeric/>

            <x-button spinner="login" icon="o-finger-print" class=" btn-primary w-2/4 mt-3"
                      label="تایید" wire:click="login"/>
        </div>


    </x-modal>


    @if(Auth::check())
        <x-button link="{{ route('panel.profile.ProfileDashboard') }}" responsive icon="o-user-circle" label="حساب کاربری"/>
    @else
        <x-button responsive icon="o-user" label="ورود" @click="$wire.loginModal = true"/>
    @endif


</div>
