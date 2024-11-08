<div>
    @push('cdn')
        <script src="{{ asset('vendor/ckstandard/ckeditor.js') }}"></script>
        <script data-navigate-once src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @endpush
    <div class="flex flex-col md:flex-row md:space-x-4">

        <div class="w-full md:w-2/3 shadow-lg m-2">

            <x-card subtitle="اطلاعات" separator progress-indicator="save" >
                <x-form wire:submit="save">
                    <x-input label="نام یا عنوان محصول" inline wire:model="name"/>

                    <div wire:ignore>
                        <textarea id="editor1" wire:model="content"></textarea>
                    </div>

                    <x-textarea label="توضیحات کوتاه" inline wire:model="description"></x-textarea>



                    <x-choices-offline

                            label="دسته"
                            wire:model.live="selectedCategories"
                            :options="$categories_list"
                            searchable
                            no-result-text="دسته ای وجود ندارد"
                    />

                    @if (!empty($subCategories))

                            <x-choices-offline

                                    label="زیر دسته"
                                    wire:model.live="selectedSubCategories"
                                    :options="$subCategories"
                                    searchable
                                    no-result-text="دسته ای وجود ندارد"
                            />

                    @endif


                </x-form>

            </x-card>

        </div>

        <!--    Separator -->
        <div class="w-full md:w-1/3 shadow-lg m-2">

           <x-card>
               <div class="flex justify-center">
               <x-file  wire:model="photos" label="تصاویر محصول" multiple  />

               </div>
               <x-menu-separator/>


               @livewire('admin.shop.inc.attribute-manager',['attribute' => $attribute,'productId' => $productId])

           </x-card>



        </div>
    </div>
</div>


<script data-navigate-once>
    function initializeCKEditor() {
        // Check if CKEditor instance already exists to avoid re-initializing
        if (CKEDITOR.instances.editor1) {
            CKEDITOR.instances.editor1.destroy();
        }

        // Initialize CKEditor
        const editor = CKEDITOR.replace('editor1', {
            language: 'fa',
        });

        // Sync CKEditor data with Livewire property when content changes
        editor.on("change", function () {
            @this.
            set('content', editor.getData());
        });
    }

    document.addEventListener("livewire:load", function () {
        initializeCKEditor();
    });

    // Re-initialize CKEditor on Livewire navigation
    document.addEventListener('livewire:navigate', (event) => {
        initializeCKEditor();
    });
    $(document).ready(function () {
        initializeCKEditor();

    });
</script>
