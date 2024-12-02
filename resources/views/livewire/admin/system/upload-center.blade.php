<div>

    <div class="container mx-auto p-6">
        <x-progress value="12" max="100" class="progress-warning h-3" />

        <div class="bg-white shadow-lg rounded-lg p-6 mb-8">
            <h2 class="text-xl font-semibold mb-4">آپلود فایل</h2>
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
                            <img class="w-20 h-25" src="{{ asset($file->file_path) }}"/>
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
    </div>



</div>
