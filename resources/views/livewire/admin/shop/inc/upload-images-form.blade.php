<x-collapse wire:model="showImages" separator class="bg-base-200">
    <x-slot:heading>تصاویر</x-slot:heading>
    <x-slot:content>
        <div class="flex justify-center">
            <x-file wire:model="photos" label="تصاویر محصول" multiple/>

        </div>
    </x-slot:content>
</x-collapse>
