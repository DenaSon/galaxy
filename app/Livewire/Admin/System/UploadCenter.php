<?php

namespace App\Livewire\Admin\System;

use App\Models\Media;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithoutUrlPagination;
use Mary\Traits\Toast;


class UploadCenter extends Component
{
    use Toast, WithFileUploads,WithoutUrlPagination;

    public array $files = [];



    public function deleteFile($id)
    {

        $media = Media::findOrFail($id);


        if (\Storage::disk('public')->exists($media->file_path)) {
            \Storage::disk('public')->delete($media->file_path);
        }

        $media->delete();


        $this->success('حذف شد', 'فایل با موفقیت حذف شد');
    }



    public function uploadFiles()
    {
        $this->validate([
            'files.*' => 'required|max:2048|image',
        ]);
        if (!empty($this->files)) {

            foreach ($this->files as $file) {
                $path = $file->store('upload_center', 'public');
                Media::create(['file_path' => $path]);

            }

            $this->success('آپلود', 'تصاویر با موفقیت آپلود شدند');
            $this->reset('files');

        }
        else
        {
            $this->warning('آپلود', 'تصویری انتخاب نشده است');
        }
    }


    public function render()
    {
       $file_list = Media::latest()->paginate(20);
        return view('livewire.admin.system.upload-center',compact('file_list'))
            ->title('آپلود فایل');
    }
}
