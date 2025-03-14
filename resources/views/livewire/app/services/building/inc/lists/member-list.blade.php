<x-card title="اعضا" subtitle="لیست ساکنین  ساختمان" separator class="border flex shadow-xl">
    @foreach ($members as $member)
        <div wire:key="member-list-{{ $member->id }}">
            <x-list-item :item="$member" no-separator no-hover link="google.com">
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
                    <x-button wire:confirm="تماس برقرار شود؟" icon="o-phone"
                              class="text-green-600  btn-success btn-outline sm:btn-sm btn-xs"
                              link="tel:{{$member->phone}}" external spinner="deleteMember"/>

                    <x-button wire:confirm="عضو ساختمان حذف شود؟" icon="o-trash"
                              class="text-red-500 sm:btn-sm btn-xs"
                              wire:click="deleteMember({{ $member->id }})" spinner="deleteMember"/>


                </x-slot:actions>

            </x-list-item>

        </div>
    @endforeach


    <x-slot:actions>


        @livewire('app.services.components.add-member',['building' => $building->id])


    </x-slot:actions>

</x-card>
