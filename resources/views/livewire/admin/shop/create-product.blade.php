<div>

    <div class="flex flex-col md:flex-row md:space-x-4">

        <div class="w-full md:w-2/3 shadow-lg m-2">

            <x-card subtitle="اطلاعات" separator progress-indicator="publish">

                <x-form>
                    <x-input icon="o-pencil" label="نام یا عنوان محصول"  wire:model.blur="name"
                             wire:dirty.class="focus:border-green-700"/>

                    <div wire:ignore>
                        <x-textarea label="توضیحات محصول"  wire:model.blur="content"></x-textarea>
                    </div>

                    <x-textarea wire:dirty.class="focus:border-green-700" label="توضیحات کوتاه"
                                wire:model="description"></x-textarea>

                    <x-choices-offline

                        label="دسته"
                        icon="o-bars-arrow-up"
                        wire:model.live="selectedCategories"
                        :options="$categories_list"
                        searchable
                        no-result-text="دسته ای وجود ندارد"
                    />


                    @if (!empty($subCategories))

                        <x-choices-offline

                            label="زیر دسته"
                            icon="o-bars-arrow-down"
                            wire:model="selectedSubCategories"
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

                <x-menu-separator/>

                @livewire('admin.shop.inc.accounting', ['pid' => $productId], key($productId))

                <x-menu-separator/>

                <x-input label="واحد"  wire:model="unit"/>
                <x-menu-separator/>
                <x-input hint="درصد تخفیف" label="تخفیف"  wire:model="discount"/>
                <x-menu-separator/>
                <x-input hint="شماره مقاله مرتبط" label="مقاله مرتبط"  wire:model="related_article_id"/>

                <x-menu-separator/>
                <x-input hint="کلمه مقاله مرتبط" label="کلمه مرتبط"  wire:model="wiki"/>


                <x-slot:actions>
                    <x-button wire:confirm="محصول منتشر شود؟" wire:click="publish" label="ذخیره"/>
                </x-slot:actions>

            </x-card>


        </div>
    </div>
</div>



