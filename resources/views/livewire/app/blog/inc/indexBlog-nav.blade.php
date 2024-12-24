<x-nav sticky full-width>

    <x-slot:brand>

        <h1 class="text-lg font-black">
            پایگاه دانستنی های دناپکس
        </h1>


    </x-slot:brand>


    <x-slot:actions>

        <x-input  label="جستجو + Enter" inline wire:model.blur="searchTerm"/>



    </x-slot:actions>
</x-nav>
