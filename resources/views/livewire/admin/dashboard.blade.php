<div>
@include('livewire.admin.inc.dashboard-overview')

    <br/>

    @livewire('admin.component.user-list')


    <button wire:click="clearCart">Clear</button>

</div>
