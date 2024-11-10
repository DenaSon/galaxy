<div>
    @push('cdn')
        <script src="{{ asset('vendor/ckstandard/ckeditor.js') }}"></script>
        <script data-navigate-once src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @endpush
    <div class="flex flex-col md:flex-row md:space-x-4">

        <div class="w-full md:w-2/3 shadow-lg m-2">

            <x-card subtitle="اطلاعات" separator progress-indicator="save">
                <x-form>
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


        <div class="w-full md:w-1/3 shadow-lg m-2">

            <x-card>

                @include('livewire.admin.shop.inc.attrs-form')
                <x-menu-separator/>

                @include('livewire.admin.shop.inc.variants-form')
                <x-menu-separator/>

                @include('livewire.admin.shop.inc.upload-images-form')

            </x-card>


        </div>
    </div>
</div>


@include('livewire.admin.template.scripts.ckeditor-init')
