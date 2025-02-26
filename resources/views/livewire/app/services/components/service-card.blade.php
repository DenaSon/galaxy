<x-card title="{{$service_title ?? ''}}">

   <p class="text-xs">
       {{ $service_description ?? '' }}
   </p>

    <x-slot:figure>
        <img loading="lazy" src="{{ $service_image ?? '' }}"/>
    </x-slot:figure>
    <x-slot:menu>
        <x-icon name="o-heart" class="cursor-pointer"/>
    </x-slot:menu>
    <x-slot:actions>
        <x-button label="شروع" class="btn-success" link="{{ $service_link }}" />
    </x-slot:actions>
</x-card>
