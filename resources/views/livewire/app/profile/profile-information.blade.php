<div>
    <div>
        <div class="container mx-auto lg:px-2 2xl:px-0 mt-2">

            <div class="flex flex-col lg:flex-row gap-4 mt-4">

                <!-- Sidebar Menu -->
                <div class="w-full lg:w-1/6 h-auto">
                    @include('livewire.app.profile.inc.sidebarMenu',['user'=>$user])
                </div>

                <!-- Main Content Area -->
                <div class="w-full lg:w-5/6 border rounded-lg">

                    <x-card separator="saveInfo" progress-indicator="saveInfo" class="flex flex-col items-center space-y-4 p-4">

                        <div class="w-6/6">
                            <x-input wire:model="first_name" label="نام" class="w-full" />
                        </div>

                        <div class="w-6/6 mt-1">
                            <x-input wire:model="last_name" label="نام خانوادگی" class="w-full" />
                        </div>

                        <x-slot:actions>
                            <div class="flex justify-center">
                                <x-button wire:click="saveInformation" label="ذخیره" />
                            </div>
                        </x-slot:actions>
                    </x-card>



                </div>
            </div>
        </div>
    </div>

</div>
