<x-modal wire:model="edit_category_modal" class="backdrop-blur p-2">

    <x-mary-card class="mt-2">
        <x-form wire:submit.prevent="updateCategory">

            <x-input label="نام دسته" wire:model="selectedCategory" class="mt-1"/>



            <x-textarea
                label="توضیحات دسته"
                wire:model="selectedCategoryDescription"
                placeholder="اینجا بنویسید...."
                hint="توضیح دسته بندی"
                rows="10"
                maxlength="40000"
                inline/>

            <x-input hidden  wire:model="selectedCategoryId"/>
            <x-slot:actions>

                <x-button label="ثبت" class="btn-primary btn-sm" type="submit" spinner></x-button>


                <x-button class="btn btn-sm" label="لغو" @click="$wire.edit_category_modal = false"/>
            </x-slot:actions>

        </x-form>
    </x-mary-card>

</x-modal>
