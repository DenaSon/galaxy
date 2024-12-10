
<x-card class="border p-4 origin-center mx-auto  sticky top-0 z-10">
    <div class="flex items-center justify-between">

        <span class="font-black text-sm text-gray-700">جمع خرید </span>

        <span class="text-left text-lg font-semibold text-primary">{{ number_format($cartCost ?? 0) }}
        <span class="text-xs">
            تومان
        </span>
        </span>
    </div>

    <div class="flex items-center justify-between mt-4">

        <span class="font-bold text-sm text-gray-700"> تعداد کل </span>

        <span class="text-left text-lg font-semibold text-primary"> {{ $carts->sum('quantity') }}
        </span>
    </div>

    <div class="flex items-center justify-center mt-5">

        @include('livewire.app.shop.cart.inc.order-button')

    </div>


</x-card>

<span class="mt-4 text-gray-400 text-xs font-thin">
توجه: موجودی برخی از محصولات محدود است. جهت از دست ندادن محصول مورد نظر، پرداخت خود را نهایی کنید.
</span>
