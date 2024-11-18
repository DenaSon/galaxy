<div class="text-center">
    <x-button

            wire:loading.attr="disabled"
            wire:target="variant"
            spinner="addToCart"
            class="btn-primary mt-8 btn-sm md:w-auto w-48 font-thin hover:btn-info hover:text-white text-xs md:text-sm"
            label="افزودن به سبد" wire:click.debounce.550ms="addToCart" icon="o-shopping-cart"/>
</div>




