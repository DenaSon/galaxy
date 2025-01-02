<div>
    @if (!empty($blogContent) && isset($blogContent['content']))
        <div class="mt-4 single-blog">
            {!! $blogContent['content']['rendered'] !!}
        </div>
    @else
        <p class="text-gray-500">توضیحات مرتبط با این محصول در حال حاضر در دسترس نیست</p>
    @endif
</div>
