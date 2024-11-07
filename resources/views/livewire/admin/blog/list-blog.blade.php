<div>
    <div class="flex flex-col md:flex-row md:space-x-4">

        <div class="w-full md:w-full shadow-lg m-2">
            @php


                $headers = [
                    ['key' => 'id', 'label' => '#'],
                    ['key' => 'name', 'label' => 'عنوان'],
                    ['key' => 'blog.category', 'label' => 'دسته'],
                    ['key' => 'status', 'label' => 'وضعیت'],
                    ['key' => 'actions', 'label' => 'اقدامات']
                ];
            @endphp

            <x-table  :headers="$headers" :rows="$blog" selectable="true" striped="true" empty-text="موردی وجود ندارد" with-pagination >


                @scope('cell_id', $blog)
                <strong>{{ $loop->iteration }}</strong>
                @endscope


                @scope('cell_name', $blog)
                <x-badge :value="$blog->title" class="badge-info text-white"/>
                @endscope


                @scope('cell_blog.category', $blog)
                <b>{{ $blog->categories->where('parent_id',null)->first->first()->name }}</b>

                |

                <small>{{ $blog->categories->where('parent_id','!=',null)->first->first()->name }}</small>
                @endscope


                @scope('cell_status', $blog)
                <u>
                    @if($blog->is_active == 0)
                        <x-badge value="پیش نویس" class="badge-warning text-white"/>
                    @else
                        <x-badge value="انتشار" class="badge-success text-white"/>
                    @endif
                </u>
                @endscope


                @scope('actions', $blog)
                <div class="flex space-x-2">
                    <x-button wire:confirm="مقاله حذف شود؟" tooltip="حذف" icon="o-trash"
                              wire:click="deleteBlog({{ $blog->id }})" spinner class="btn-sm "/>
                    <x-button tooltip="ویرایش" icon="o-pencil-square" wire:click="editBlog({{ $blog->id }})" spinner
                              class="btn-sm"/>
                </div>

                @endscope

            </x-table>


        </div>


    </div>
</div>
