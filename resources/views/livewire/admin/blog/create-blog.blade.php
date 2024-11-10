<div>

    @push('cdn')
        <script src="{{ asset('vendor/ckstandard/ckeditor.js') }}"></script>
        <script data-navigate-once src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @endpush


    <div class="flex flex-col md:flex-row md:space-x-4">

        <div class="w-full md:w-2/3 shadow-lg m-2">
            <x-card separator progress-indicator="save" subtitle="اطلاعات مقاله">

                <x-form wire:submit="save">

                    <x-input placeholder="عنوان مقاله" icon="o-pencil" wire:model="title"/>

             <div wire:ignore>
                 <textarea id="editor1" wire:model="content">
                 </textarea>
             </div>

                    <x-choices-offline
                        label="دسته"
                        wire:model.live="selectedCategories"
                        :options="$categories_list"
                        searchable
                        no-result-text="دسته ای وجود ندارد"
                    />

                    @if (!empty($subCategories))
                        <div class="flex justify-center">
                            <select multiple wire:model="selectedSubCategories"
                                    class="select select-warning w-full max-w-lg">
                                <option disabled value="">انتخاب زیر دسته</option>
                                @foreach ($subCategories as $subCategory)
                                    <option value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif


                </x-form>


            </x-card>
        </div>


        <div class="w-full md:w-1/3  m-2">
            <x-card separator progress-indicator="save" class="shadow-lg mb-2">
                <div class="flex justify-center">
                    <x-file hint="" label="تصویر شاخص" wire:model="photo" accept="image/png, image/jpeg">
                        <img src="{{ asset('admin/assets/images/products/product-1.png') }}" class="h-40 rounded-lg"/>
                    </x-file>
                </div>


            </x-card>

            <x-card separator progress-indicator="save" class="shadow-lg" subtitle="یادداشت">

                <x-textarea

                    wire:model="additionalInfo"
                    placeholder="یادداشت مقاله"
                    hint="255 کلمه"
                    rows="5"
                    inline/>


            </x-card>

            <x-card class="shadow-lg mt-2">

                <x-checkbox label="پیش نویس" wire:model="draft" class="checkbox-warning mb-3" left tight/>


                <x-button class="btn btn-accent bg-blue-500" tooltip="ثبت" icon="o-arrow-up-on-square" spinner
                          wire:click.debounce.250ms="save" class="w-full" label="ثبت"></x-button>

            </x-card>


        </div>


    </div>


</div>

@include('livewire.admin.template.scripts.ckeditor-init')




