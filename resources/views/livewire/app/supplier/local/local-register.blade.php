<x-steps wire:model="step" class="border rounded my-8 p-8">
    <x-step class="p-2"  step="1" text="ثبت‌نام" step-classes="w-full">
        @if(Auth::check())
            <div class="text-center">
                <b> {{ Auth::user()->phone }} </b>
            </div>
        @else
            <x-button wire:click="loginAction" label="ثبت‌نام" class="btn btn-primary btn-block"/>
        @endif
    </x-step>
    <x-step step="2" text="ثبت اطلاعات">

            <x-input inline="" placeholder="نام" wire:model.live="name"/>
            <x-input placeholder="نام خانوادگی" wire:model.live="last_name"/>
            <x-textarea inline="" placeholder="محصولات قابل تامین"/>

    </x-step>
    <x-step step="3" text="تایید نهایی" class="bg-orange-500/20">
        Receive Product
    </x-step>
</x-steps>
