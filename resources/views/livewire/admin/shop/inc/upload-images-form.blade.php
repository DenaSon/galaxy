<x-collapse wire:model="showImages" separator class="bg-base-200">
<x-slot:heading>تصاویر محصول</x-slot:heading>
<x-slot:content>
<x-form>

    <x-file  multiple wire:model="photos" accept="image/*"></x-file>

    <x-slot:actions>
        <x-button spinner icon="o-arrow-up-tray" wire:confirm="تصاویر آپلود شوند؟"
                  wire:click="uploadPhotos({{$productId}})" class="btn bg-blue-200"></x-button>
    </x-slot:actions>
</x-form>


@if(!empty($photo_list))

    @foreach($photo_list as $photo)


            <div class="relative" wire:key="{{$photo->id}}">
                <img src="{{ $photo->file_path }}" alt="Image" class="w-full h-auto rounded">
                <x-button
                    spinner
                    wire:confirm="تصویر حذف شود؟"
                    wire:click="removeImage({{ $photo->id }})"
                    icon="o-trash"
                    class="btn-sm absolute bottom-2 left-1/2 transform -translate-x-1/2 bg-red-500 text-white py-1 px-3 mt-2 rounded hover:bg-red-600"/>

            </div>



    @endforeach

@endif


</x-slot:content>
</x-collapse>
