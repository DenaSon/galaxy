<div class="flex justify-center items-center">

    <div class="container mx-auto">
        <x-card class="flex flex-col items-center  max-w-4xl" separator title="ثبت‌نام تامین کنندگان">

            <x-steps wire:model="step" class="border my-5 p-5 w-3/4 max-w-2xl">
                <x-step step="1" text="ثبت‌نام" step-classes="w-full">
                    @if(Auth::check())
                        <div class="text-center">
                            <b> {{ Auth::user()->phone }} </b>
                        </div>
                    @else
                        <x-button wire:click="loginAction" label="ثبت‌نام" class="btn btn-primary btn-block"/>
                    @endif
                </x-step>
                <x-step step="2" text="ثبت اطلاعات">
                    <x-form>
                        <x-input inline="" placeholder="نام" wire:model.live="name"/>
                        <x-input placeholder="نام خانوادگی" wire:model.live="last_name"/>
                        <x-textarea inline="" placeholder="محصولات قابل تامین"/>
                    </x-form>
                </x-step>
                <x-step step="3" text="تایید نهایی" class="bg-orange-500/20">
                    Receive Product
                </x-step>
            </x-steps>

            {{-- دکمه‌های ناوبری مراحل --}}
            <div class="flex justify-between w-3/4 max-w-2xl mt-5">
                <x-button label="مرحله قبل" wire:click="prev" class="btn-outline"/>
                <x-button class="btn-success" label="مرحله بعد" wire:click="next"/>
            </div>

        </x-card>
    </div>

</div>
