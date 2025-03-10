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

                            {{ $elevator->translateStatus($elevator->status) }}


                        </x-slot:value>
                        <x-slot:sub-value>

                            {{ $elevator->translateType($elevator->type) ?? 'N/A' }} با ظرفیت
                            {{ $elevator->capacity }} نفر
                        </x-slot:sub-value>
                        <x-slot:actions>
                            <x-button wire:confirm="آسانسور حذف شود؟" icon="o-trash" class="text-red-500 btn-sm"
                                      wire:click="deleteElevator({{ $elevator->id }})" spinner="delete"/>

                        </x-slot:actions>
                    </x-list-item>

                </div>
            @endforeach

            <x-slot:actions>
                @livewire('app.services.components.add-elevator',['building' => $building])
            </x-slot:actions>

        </x-card>


        <x-card class="flex" title="اعضای ساختمان" subtitle="لیست اعضای ساختمان" shadow separator>


            @foreach ($members as $member)
                <div wire:key="{{ $member->id }}">
                    <x-list-item :item="$member" no-separator no-hover>
                        <x-slot:avatar>
                            <x-badge value="{{ $member->name }}" class="badge-success badge-outline"/>
                        </x-slot:avatar>
                        <x-slot:value>

                            طبقه {{ $member->floor }} واحد {{ $member->unit }}


                        </x-slot:value>
                        <x-slot:sub-value>
                            {{ formatPhoneNumber($member->phone) }}
                        </x-slot:sub-value>
                        <x-slot:actions>
                            <x-button wire:confirm="عضو ساختمان حذف شود؟" icon="o-phone"
                                      class="text-green-600 btn-sm btn-success btn-outline"
                                      wire:click="deleteMember({{ $member->id }})" spinner="deleteMember"/>

                            <x-button wire:confirm="عضو ساختمان حذف شود؟" icon="o-trash" class="text-red-500 btn-sm"
                                      wire:click="deleteMember({{ $member->id }})" spinner="deleteMember"/>


                        </x-slot:actions>

                    </x-list-item>

                </div>
            @endforeach


            <x-slot:actions>

                @livewire('app.services.components.add-member',['building' => $building->id])

            </x-slot:actions>

        </x-card>


    </div>


</div>
