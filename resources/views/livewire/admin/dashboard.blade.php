<div>
@include('livewire.admin.inc.dashboard-overview')


    <x-button wire:confirm="Delete ALL ?" wire:click.debounce="clearCart" label="Delete" spinner=""/>

</div>
