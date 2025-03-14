<div class="inline-block me-2">
    <x-modal wire:model="staticMap" wire:key="request-{{$request->id}}" class="p-0 m-0 overflow-hidden">
        <div>

            <img
                class="w-full h-full object-cover"
                src="https://api.neshan.org/v4/static?key={{ $apiKey }}&type=neshan&width=500&height=350&zoom=16&center={{ $lat }},{{ $lng }}&markerToken=431815.ZlPCN9kU"
                alt="Static Map">

        </div>

    </x-modal>

    <x-button responsive icon="o-map" @click="$wire.staticMap = true" class="btn-warning btn-xs"/>

</div>
