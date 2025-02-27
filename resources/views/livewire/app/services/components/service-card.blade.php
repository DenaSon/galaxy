<x-card class="border border-gray-200 shadow-lg rounded-2xl overflow-hidden transition hover:shadow-xl">
    <x-slot:figure>
        <img src="{{ $service_image ?? '' }}" class="w-full h-52 object-cover"/>
    </x-slot:figure>

    <div class="p-4">
        <h3 class="text-lg font-semibold text-gray-800">{{ $service_title ?? '' }}</h3>
        <p class="text-xs text-gray-600 mt-2">{{ $service_description ?? '' }}</p>
    </div>

    <x-slot:menu>
        <x-icon name="o-heart" class="cursor-pointer text-gray-500 hover:text-red-500 transition"/>
    </x-slot:menu>

    <x-slot:actions>

        <x-button label="شروع" class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-2 rounded-lg transition" link="{{ $service_link }}" />


    </x-slot:actions>
</x-card>
