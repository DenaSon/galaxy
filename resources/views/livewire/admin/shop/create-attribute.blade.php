<div>
    <div class="flex flex-col md:flex-row md:space-x-4">
        <div class="w-full md:w-1/3 shadow-lg m-2">
            <x-card separator progress-indicator="save" subtitle="افزودن ویژگی">
           <x-form>

               <x-input wire:model="name" label="نام ویژگی" inline>
                   <x-slot:append>

                       <x-button wire:click="save" label="افزودن" icon="o-check" class="btn-primary rounded-s-none" />
                   </x-slot:append>
               </x-input>


           </x-form>
            </x-card>
        </div>




        <!--    Separator -->

        <div class="w-full md:w-2/3 shadow-lg m-2">

           <x-card>

               @foreach ($attributes as $attribute)
                   <x-list-item :item="$attribute" >

                       <x-slot:actions>
                           <x-button wire:confirm="ویژگی حذف شود؟" icon="o-trash" class="text-red-500 btn-xs" wire:click="delete({{ $attribute->id }})" spinner />
                       </x-slot:actions>
                   </x-list-item>
               @endforeach


           </x-card>


        </div>

    </div>
</div>
