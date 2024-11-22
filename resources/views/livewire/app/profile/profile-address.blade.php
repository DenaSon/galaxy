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


                        <div class="w-full lg:w-1/2 m-2">
                            @livewire('app.component.states-field',key($user->id))
                        </div>

                        <div class="w-full lg:w-1/2 m-2">
                            @livewire('app.component.city-field',key($user->id))
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>

</div>
