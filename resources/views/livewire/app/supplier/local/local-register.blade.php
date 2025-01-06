<div>

    <div class="container mx-auto">


        <x-card class="flex justify-center items-center" separator title="ثبت‌نام تامین کنندگان">


            <x-steps wire:model="step" class="border my-5 p-5">
                <x-step step="1" text="ثبت‌نام">
                    @if(Auth::check())
                        <div class="text-center">
                            <b> {{ Auth::user()->phone }} </b>

                        </div>
                    @else
                        <x-button wire:click="loginAction" label="ثبت‌نام" class="btn btn-primary btn-block"/>
                    @endif
                </x-step>
                <x-step step="2" text="Payment">
                    <x-form>
                        <x-input inline="" placeholder="نام" wire:model.live="name"/>
                        <x-input placeholder="نام خانوادگی" wire:model.live="last_name"/>
                        <x-tags placeholder="محصولات" wire:model="tags" icon="o-tag" hint="محصولات خود را اضافه کنید"/>

                    </x-form>
                </x-step>
                <x-step step="3" text="Receive Product" class="bg-orange-500/20">
                    Receive Product
                </x-step>
            </x-steps>

            {{-- Create some methods to increase/decrease the model to match the step number --}}
            {{-- You could use Alpine with `$wire` here --}}
            <x-button label="مرحله قبل" wire:click="prev"/>
            <x-button class="btn-success" label="مرحله بعد" wire:click="next"/>


        </x-card>


    </div>


</div>
