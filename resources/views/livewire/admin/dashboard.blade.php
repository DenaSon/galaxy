<div>
@include('livewire.admin.inc.dashboard-overview')

    <br/>

    <div class="flex flex-row flex-wrap md:flex-nowrap">
        <div class="w-full md:w-auto">
            @livewire('admin.component.user-list')
        </div>
        <div class="w-full md:w-auto">

        </div>
    </div>


    <button wire:click="clearCart">Clear</button>

</div>
