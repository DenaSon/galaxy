@if($showCartButton == true)
    <x-button  wire:transition.out.opacity.duration.500ms link="{{ route('panel.shop.cart') }}" class="mt-3 btn-xs font-thin btn-success text-white" label="مشاهده سبد خرید" icon="o-eye"/>
@endif


