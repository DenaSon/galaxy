<div class="container  max-w-full">

<x-card progress-indicator separator>

    <x-form wire:submit="saveComment({{$product}})" >
        <x-input inline label="نام" wire:model="username" />
        <x-textarea inline label="متن دیدگاه" wire:model="text"></x-textarea>
       <div class="text-center">
           <x-rating label="امتیاز" wire:model="rating" class="bg-warning" total="5" />
       </div>

        <x-slot:actions>
            <x-button  label="ارسال دیدگاه" class="btn-primary" type="submit" spinner="saveComment" />
        </x-slot:actions>
    </x-form>

</x-card>



</div>
