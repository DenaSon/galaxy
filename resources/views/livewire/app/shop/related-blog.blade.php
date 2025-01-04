<div>
    @if (!empty($blogContent) && isset($blogContent['content']))
        <div class="mt-4 single-blog">

            {!! \Illuminate\Support\Str::limit(preg_replace('/<img[^>]*>/i', '', $blogContent['content']['rendered']), 2500, '...') !!}


            <div class="flex justify-center">
                <x-button
                    external
                    icon="o-ellipsis-horizontal-circle"
                    link="{{ singleBlogUrl($blogContent['id'],$blogContent['title']['rendered']) }}"
                    label="ادامه مطلب"
                />
            </div>


        </div>
    @else

    @endif
</div>
