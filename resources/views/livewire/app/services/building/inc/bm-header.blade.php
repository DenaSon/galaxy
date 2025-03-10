<x-header separator size="text-2xl" title="ساختمان {{ $building->builder_name }}"
          subtitle="{{ \Illuminate\Support\Str::limit($building->address,34) }}">

    <x-slot:middle class="!justify-end">

        <div class="text-center mx-auto">


        </div>
    </x-slot:middle>


    <x-slot:actions>

    </x-slot:actions>


</x-header>
