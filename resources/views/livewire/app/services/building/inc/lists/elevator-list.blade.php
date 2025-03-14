<x-card class="flex text-sm shadow-xl border" title="آسانسور" subtitle=" آسانسور‌های ساختمان" separator>


    @foreach ($elevators as $elevator)
        <div wire:key="elevator-list-{{ $elevator->id }}">
            <x-list-item :item="$elevator" no-separator no-hover>
                <x-slot:avatar>
                    <x-badge value="{{ $elevator->national_code }}" class="badge-info hidden sm:block"/>
                </x-slot:avatar>
                <x-slot:value>

                    {{ $elevator->translateStatus($elevator->status) }}


                </x-slot:value>
                <x-slot:sub-value>

                    {{ $elevator->translateType($elevator->type) ?? 'N/A' }}
                    {{ $elevator->capacity }} نفره
                </x-slot:sub-value>
                <x-slot:actions>

                    <livewire:app.services.components.send-request
                        :building="$building->id"
                        :elevator="$elevator->id"
                        key="elevator-{{ $elevator->id }}"/>

                    <x-button wire:confirm="آسانسور حذف شود؟" icon="o-trash"
                              class="text-red-500 sm:btn-sm btn-xs"
                              wire:click="deleteElevator({{ $elevator->id }})" spinner="delete"/>

                </x-slot:actions>
            </x-list-item>

        </div>
    @endforeach

    <x-slot:actions>

        @livewire('app.services.components.add-elevator',['building' => $building])


    </x-slot:actions>

</x-card>
