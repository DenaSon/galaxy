<div>



    @include('livewire.admin.blog.inc._edit-category')

    <div class="flex flex-col md:flex-row md:space-x-4">
        <x-card progress-indicator="save" separator subtitle="افزودن دسته فروشگاه" class="w-full md:w-1/2 shadow-md m-1">


            <x-form wire:submit="save">
                <x-input label="نام دسته" wire:model="name" icon="o-pencil"/>
                <x-editor wire:model="description" label="Description" hint="توضیحات دسته"/>


                <x-choices-offline
                    label="دسته والد"
                    wire:model="parentList"
                    :options="$category_list"
                    placeholder="جستجو دسته"
                    single
                    icon="o-magnifying-glass"
                    no-result-text="بدون نتیجه"
                    searchable/>


                <x-slot:actions>
                    <x-button type="submit" label="ذخیره" spinner="save"/>
                </x-slot:actions>

            </x-form>


        </x-card>


        <x-card subtitle="لیست دسته" progress-indicator class="w-full md:w-1/2 shadow-md m-1">
            @php
                $headers = [
                        ['key' => 'id', 'label' => '#', 'class' => 'hidden'],
                      ['key' => 'name', 'label' => 'دسته'],];
            @endphp

            <x-table  :headers="$headers" :rows="$categories" wire:model="expanded" expandable with-pagination>


                @scope('expansion', $category)
                @php

                    $selectedCategoryType = null;
                @endphp
                <div class="flex justify-between items-center">
                    <div class="text-primary tooltip" data-tip="{{ $category->description }}">
                        {{ $category->name }}


                    </div>
                    <div>
                        <x-button wire:click="editCategory({{$category->id}})" icon="o-pencil"
                                  class="btn-square btn-xs font-thin text-sm mr-2"/>
                        <x-button icon="o-trash" class="btn-square btn-xs font-thin text-sm"
                                  @click="confirm('آیا مطمئن هستید که می‌خواهید این دسته را حذف کنید؟') && $wire.deleteCategory({{ $category->id }})"/>
                    </div>
                </div>


                @if($category->children->isNotEmpty())
                    <ul class="mt-2 pl-2">
                        @foreach($category->children as $subcategory)
                            <li class="mb-1">
                                <div class="bg-base-200 p-2 font-light">
                                    <div class="flex justify-between items-center">
                                        <div class="flex">
                                            {{ $subcategory->name }}
                                        </div>
                                        <div class="flex">
                                            <x-button wire:click="editSubCategory({{$subcategory->id}})" icon="o-pencil"
                                                      class="btn-square btn-xs font-thin text-sm mr-2"/>
                                            <x-button icon="o-trash" class="btn-square btn-xs font-thin text-sm"
                                                      @click="confirm('آیا مطمئن هستید که می‌خواهید این دسته را حذف کنید؟') && $wire.deleteSubCategory({{ $subcategory->id }})"/>
                                        </div>





                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-sm text-gray-500">هیچ زیر دسته‌ای وجود ندارد</p>
                @endif
                @endscope


            </x-table>
        </x-card>


    </div>


</div>
