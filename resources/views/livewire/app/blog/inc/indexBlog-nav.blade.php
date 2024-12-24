<x-nav sticky full-width>

    <x-slot:brand>

        <h1 class="sm:text-lg font-black text-sm">
           دانشنامه
        </h1>


    </x-slot:brand>


    <x-slot:actions>

        <x-input label="جستجو + Enter" inline wire:model.live.debounce.500ms="searchTerm"/>



    </x-slot:actions>
</x-nav>
<x-progress wire:loading class="progress-primary h-0.5" indeterminate/>
