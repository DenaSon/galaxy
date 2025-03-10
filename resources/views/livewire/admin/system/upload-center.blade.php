<div>

    <x-card class="container mx-auto p-6" title="آپلود فایل">



        <div class="bg-white shadow-lg rounded-lg p-6 mb-8">
            <x-hr target="uploadFiles"/>

            <x-file wire:model="files" label="Upload File" multiple />

            <x-button spinner="uploadFiles" label="Upload" wire:click="uploadFiles" class="m-4"/>

        </div>

        <div class="clear-both">
        </div>




        <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">فایل‌های آپلود شده</h2>
            <ul class="space-y-2">


               @if( isset($file_list) && $file_list->count())
                   @foreach($file_list as $file)

                        <li class="flex justify-between items-center bg-gray-50 p-4 rounded-md border border-gray-200">
                            <span class="text-gray-700">{{ \Illuminate\Support\Str::limit($file->file_path,30,'...') }}</span>
                           <a href="{{ asset($file->file_path) }}" target="_blank">
                               <img class="pax-img-thumbnail" src="{{ asset($file->file_path) }}" style="height: 85px;width: 75px" alt=""/>
                           </a>
                            <button
                                wire:confirm="حذف شود؟"
                                wire:click="deleteFile({{ $file->id }})"
                                class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700 btn-sm">
                                حذف
                            </button>

                        </li>

                   @endforeach


               @endif

            </ul>
        </div>
    </x-card>



</div>
