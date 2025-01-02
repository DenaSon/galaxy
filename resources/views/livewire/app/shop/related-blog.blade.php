<div>
    @if (!empty($blogContent) && isset($blogContent['content']))
        <div class="mt-4 single-blog">

            {!! \Illuminate\Support\Str::limit($blogContent['content']['rendered'] ,3500,'...') !!}

            <x-button external=""  link="{{ singleBlogUrl($blogContent['id'],$blogContent['title']['rendered']) }}" label="ادامه مطلب"/>

        </div>
    @else
        <p class="text-gray-500">توضیحات مرتبط با این محصول در حال حاضر در دسترس نیست</p>
    @endif
</div>
