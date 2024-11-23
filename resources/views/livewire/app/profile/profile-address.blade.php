<div>
    <div>
        <div class="container mx-auto lg:px-2 2xl:px-0 mt-2">

            <div class="flex flex-col lg:flex-row gap-4 mt-4">

                <!-- Sidebar Menu -->
                <div class="w-full lg:w-1/6 h-auto">
                    @include('livewire.app.profile.inc.sidebarMenu')
                </div>

                <!-- Main Content Area -->
                <div class="w-full lg:w-5/6 border rounded-lg">


                    <div class="flex flex-col lg:flex-row   lg:space-x- text-center m-2 p-2">

                        @livewire('app.component.address-modal',['user' => $user])
                    </div>

                    @if($user->addresses->isNotEmpty())
                        <x-badge value="شما {{ $user->addresses->count() }} آدرس ثبت شده دارید"/>
                    @else

                      <span class="p-3">  هنوز هیج آدرسی برای شما ثبت نشده است</span>

                        <div class="text-center">
                            <x-button wire:click="registerAddress" spinner="registerAddress" icon="o-plus" label="ثبت آدرس"/>
                        </div>
                    @endif


                </div>
            </div>
        </div>
    </div>

</div>
