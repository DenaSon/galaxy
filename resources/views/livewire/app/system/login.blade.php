<div>
@if(!Auth::check())


    <x-modal wire:model="loginModal" class="backdrop-blur-0" box-class="w-96" style="z-index: 1000">
        <div class="flex items-center justify-center mb-2">

            <x-button wire:click="showTip" icon="o-information-circle" class="ms-2 bg-gray-50 btn-xs btn-ghost"

                      tooltip-bottom="برای ورود یا ثبت‌نام، شماره تلفن خود را وارد کرده و کد یکبارمصرف ارسال‌شده را وارد کنید"></x-button> &nbsp;

            <div class="text-gray-400 text-sm">ورود | ثبت‌نام</div>
        </div>


        <x-input icon-right="o-phone"   wire:model="phoneNumber" label="شماره همراه" inline></x-input>


        <div class="flex items-center justify-center">

            <x-button spinner="sendVerifySms" icon="o-arrow-right-end-on-rectangle" class="btn-primary w-2/4 mt-3 rounded-lg"
                      label="تایید و ادامه" wire:click="sendVerifySms"/>
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

    @endif
    @if(Auth::check() && Auth::user()->hasRole('customer'))
        <x-button class="sm:text-xs text-xs"  link="{{ route('panel.profile.profileDashboard') }}"  icon="o-user-circle" label="پروفایل"/>
    @elseif(Auth::check() && Auth::user()->hasRole('master'))
        <x-button class="sm:text-xs text-xs"  link="{{ route('master.dashboard') }}"  icon="o-user-circle" label="پنل مدیریت"/>
    @else
        <x-button spinner class="sm:text-xs text-xs"  icon="o-user" label="ورود | ثبت‌نام" @click="$wire.loginModal = true"/>
    @endif


    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('reload', (event) => {

                location.reload();

            });
        });
    </script>

</div>
