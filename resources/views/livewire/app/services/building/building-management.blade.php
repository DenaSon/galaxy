<div class="container mx-auto">

    @include('livewire.app.services.building.inc.bm-header')


    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

        <x-card class="flex text-sm" title="آسانسور ها" subtitle="لیست آسانسور های ساختمان" shadow separator>


            @foreach ($elevators as $elevator)
                <x-list-item :item="$elevator" no-separator no-hover>
                    <x-slot:avatar>
                        <x-badge value="{{ $elevator->national_code }}" class="badge-primary"/>
                    </x-slot:avatar>
                    <x-slot:value>
                        {{ $elevator->type }} {{-- Example property --}}
                    </x-slot:value>
                    <x-slot:sub-value>
                        {{ $elevator->status ?? 'بدون ساختمان' }} {{-- Example nested property --}}
                    </x-slot:sub-value>
                    <x-slot:actions>
                        <x-button icon="o-trash" class="text-red-500" wire:click="delete({{ $elevator->id }})" spinner/>
                    </x-slot:actions>
                </x-list-item>
            @endforeach


        </x-card>


        <x-card class="flex" title="اعضای ساختمان" subtitle="لیست اعضای ساختمان" shadow separator>

            درحال تکمیل

        </x-card>


    </div>


</div>
