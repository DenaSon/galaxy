<x-nav sticky full-width>

    <x-slot:brand>

        <h1 class="font-black text-lg">
           دانشنامه
        </h1>


    </x-slot:brand>


    <x-slot:actions>

        <x-input label="جستجو در دانشنامه" inline wire:model.live.debounce.500ms="searchTerm"/>



    </x-slot:actions>
</x-nav>
<x-progress wire:loading class="progress-primary h-0.5" indeterminate/>

