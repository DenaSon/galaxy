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


                    @livewire('app.component.user-order-list')


                </div>
            </div>
        </div>
    </div>

</div>
