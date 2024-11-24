<div>
    <div>
        <div class="container mx-auto lg:px-2 2xl:px-0 mt-2">

            <div class="flex flex-col lg:flex-row gap-4 mt-4">

                <!-- Sidebar Menu -->
                <div class="w-full lg:w-1/6 h-auto">
                    @include('livewire.app.profile.inc.sidebarMenu')
                </div>

                <div class="w-full lg:w-5/6 border rounded-lg">
                    <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">
                        @include('livewire.app.profile.inc.profile-statistic')
                    </div>

                    <div class="flex-wrap">
                        @livewire('app.component.user-order-list',['user'=>$user])
                    </div>


                </div>
            </div>
        </div>
    </div>

</div>
