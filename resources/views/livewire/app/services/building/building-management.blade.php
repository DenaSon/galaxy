<div class="container mx-auto">

    @include('livewire.app.services.building.inc.bm-header')


    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

        @include('livewire.app.services.building.inc.lists.elevator-list')


        @include('livewire.app.services.building.inc.lists.member-list')


    </div>

    <div class="flex justify-center mt-4">

        @livewire('app.services.components.request-list',['building' => $building->id])

    </div>


</div>
