<div>
    @if (!empty($blogContent) && isset($blogContent['content']))
        <div class="mt-4 single-blog">

            {!! \Illuminate\Support\Str::limit($blogContent['content']['rendered'] ,1000,'...') !!}

        </div>
    @else
        <p class="text-gray-500">توضیحات مرتبط با این محصول در حال حاضر در دسترس نیست</p>
    @endif
</div>
