<div class="container mx-auto">

    @include('livewire.app.services.building.inc.bm-header')


    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

        <x-card class="flex text-sm" title="آسانسور ها" subtitle="لیست آسانسور های ساختمان" shadow separator>


            @foreach ($elevators as $elevator)
                <div wire:key="{{ $elevator->id }}">
                    <x-list-item :item="$elevator" no-separator no-hover>
                        <x-slot:avatar>
                            <x-badge value="{{ $elevator->national_code }}" class="badge-primary"/>
                        </x-slot:avatar>
                        <x-slot:value>

                            {{ $elevator->translateType($elevator->type) ?? 'N/A' }} با ظرفیت
                            {{ $elevator->capacity }} نفر


                        </x-slot:value>
                        <x-slot:sub-value>
                            {{ $elevator->translateStatus($elevator->status) }}
                        </x-slot:sub-value>
                        <x-slot:actions>
                            <x-button wire:confirm="آسانسور حذف شود؟" icon="o-trash" class="text-red-500 btn-sm"
                                      wire:click="delete({{ $elevator->id }})" spinner/>

                        </x-slot:actions>
                    </x-list-item>
                    <x-hr/>
                </div>
            @endforeach


        </x-card>


        <x-card class="flex" title="اعضای ساختمان" subtitle="لیست اعضای ساختمان" shadow separator>

            درحال تکمیل

        </x-card>


    </div>


</div>
