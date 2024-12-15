<div>
    @push('cdn')
        <script src="{{ asset('vendor/charts/chart.umd.min.js') }}"></script>

    @endpush
@include('livewire.admin.inc.dashboard-overview')

    <br/>

    <div class="flex flex-col md:flex-row">
        <div class="w-full md:w-2/3">
            @livewire('admin.component.user-list')
        </div>

        <div class="w-full md:w-1/3 border mt-4 md:mt-0">

           @livewire('admin.shop.cart.sales-chart')


        </div>

        <x-button wire:click="clearCart" label="clear"></x-button>

    </div>





</div>
