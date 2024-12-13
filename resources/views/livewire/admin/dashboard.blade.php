<div>
    @push('cdn')
        <script src="{{ asset('vendor/charts/chart.umd.min.js') }}"></script>

    @endpush
    @include('livewire.admin.inc.dashboard-overview')

    <br/>

    <div class="flex flex-col md:flex-row">
        <div class="w-full md:w-full">
            @livewire('admin.component.user-list')

            @livewire('admin.shop.cart.sales-chart')
        </div>

    </div>


</div>
