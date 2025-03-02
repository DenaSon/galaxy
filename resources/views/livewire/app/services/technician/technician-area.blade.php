<div>
    <div class="container mx-auto">


    @if(Auth::user()->isNotTechnician())

            @include('livewire.app.services.technician.inc.technician-register')

        @else

            @include('livewire.app.services.technician.inc.technician-features')

        @endif

        @livewire('app.component.address-modal')

    </div>
</div>
