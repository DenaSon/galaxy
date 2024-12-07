<div>
@include('livewire.admin.inc.dashboard-overview')

    <br/>

    <div class="flex flex-row">
        @livewire('admin.component.user-list')
    </div>


    <button wire:click="clearCart">Clear</button>

</div>
