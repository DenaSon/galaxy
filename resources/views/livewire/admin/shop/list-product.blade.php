<div>
    @livewire('admin.shop.inc.create-product-overview')
    <x-menu-separator/>


    <div>

        <section id="search" class="flex flex-1m-2 p-4">
            <x-input wire:model.lazy="searchTerm" label="جستجو" inline/>
            <br/>


        </section>



        <div class="flex flex-col md:flex-row md:space-x-4">



            <div class="w-full md:w-full shadow-lg m-2">
                @php


                    $headers = [
                        ['key' => 'id', 'label' => '#'],
                        ['key' => 'name', 'label' => 'نام'],
                        ['key' => 'category', 'label' => 'دسته'],
                        ['key' => 'status', 'label' => 'وضعیت'],
                        ['key' => 'views', 'label' => 'بازدید'],
                        ['key' => 'actions', 'label' => 'اقدامات']
                    ];
                @endphp
                <x-progress indeterminate wire:loading value="10" max="100" class="progress-primary h-2" />
                <x-table :headers="$headers" :rows="$product" selectable="true" striped="true"
                         empty-text="موردی وجود ندارد" with-pagination :sort-by="$sortBy">


                    @scope('cell_id', $product)
                    <strong>{{ $loop->iteration }}</strong>
                    @endscope

                    @if($product->is_active == 1)

                        @scope('cell_name', $product)
                        <x-badge :value="$product->name" class="badge-success text-white"/>
                        @endscope
                    @else

                        @scope('cell_name', $product)
                        <x-badge :value="$product->name" class="badge-secondary text-white"/>
                        @endscope

                    @endif


                    @scope('cell_category', $product)
                    <b>{{ $product->categories->where('parent_id',null)->where('type','product')->first()->name ?? 'N/A'}}</b>

                    -

                    <small>{{ $product->categories->where('parent_id','!=',null)->where('type','product')->first()->name ?? 'N/A' }}</small>
                    @endscope


                    @scope('cell_status', $product)
                    <u>
                        @if($product->is_active == 0)
                            <x-badge value="غیرفعال" class="badge-warning text-white"/>
                        @else
                            <x-badge value="فعال" class="badge-success text-white"/>
                        @endif
                    </u>
                    @endscope

                    @scope('cell_views', $product)
                    <b>{{ $product->views }}</b>


                    @endscope


                    @scope('actions', $product)
                    <div class="flex space-x-2">

                        <x-button tooltip="ویرایش" icon="o-pencil-square" wire:click="editProduct({{ $product->id }})"
                                  spinner
                                  class="btn-sm"/>

                      @if($product->is_active && $product->stop_selling == null)
                            <x-button wire:confirm="محصول غیرفعال شود؟" tooltip="غیرفعال سازی" icon="o-power"
                                      wire:click="deActiveProduct({{ $product->id }})" spinner
                                      class="btn-sm bg-red-500 text-white gap-2"/>
                        @else
                            <x-button wire:confirm="محصول فعالسازی شود؟" tooltip="فعال سازی" icon="o-power"
                                      wire:click="ActiveProduct({{ $product->id }})" spinner
                                      class="btn-sm  bg-green-500 text-white gap-2"/>
                      @endif


                    </div>

                    @endscope

                </x-table>


            </div>


        </div>
    </div>


</div>
