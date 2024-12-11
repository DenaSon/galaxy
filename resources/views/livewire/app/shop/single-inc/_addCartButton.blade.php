<div class="text-center">
    @if(Auth::check())
    <x-button
        wire:loading.attr="disabled"

        class="btn-primary mt-8 btn-sm md:w-auto w-52 font-thin hover:btn-info hover:text-white text-xs md:text-sm"
        label="افزودن به سبد" wire:click="addToCart" icon="o-shopping-cart"/>
    @else
        <x-button
            wire:loading.attr="disabled"

            class="btn-primary mt-8 btn-sm md:w-auto w-52 font-thin hover:btn-info hover:text-white text-xs md:text-sm"
            label="افزودن به سبد"
            wire:click="dispatch('openLoginModal')"
             icon="o-shopping-cart"/>
    @endif
</div>


