@if($showCartButton == true)
    <x-button
        link="{{ route('panel.shop.cart') }}"
        class="mt-3 btn-xs font-thin btn-success text-white animate-fade-in-up"
        label="مشاهده سبد خرید"
        icon="o-eye"
    />
    @endif
