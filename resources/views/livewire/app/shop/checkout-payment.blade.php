<div>
    @if($paymentStatus === 'failed')

        @include('livewire.app.shop.checkout-inc.failed-payment')
    @else

        @include('livewire.app.shop.checkout-inc.success-payment')

    @endif


</div>
