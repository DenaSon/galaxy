@if(Auth::user()->addresses()->count('id') > 0)
    <x-button spinner="registerOrder"
              wire:click.debounce.100ms="registerOrder"
              class="font-normal text-center bg-primary text-white w-52 hover:bg-primary/90"
              label="تایید سفارش"></x-button>

@else
    <x-button spinner
              wire:click="regAddress"
              class="font-normal text-center bg-primary text-white w-52 hover:bg-primary/90"
              label="تایید سفارش"></x-button>
@endif
