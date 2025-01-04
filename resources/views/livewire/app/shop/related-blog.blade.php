<div>
    @if (!empty($blogContent) && isset($blogContent['content']))
        <div class="mt-4 single-blog">

                <?php
                $contentWithoutImages = preg_replace('/<img[^>]*>/i', '', $blogContent['content']['rendered']);
                $limitedContent = \Illuminate\Support\Str::limit($contentWithoutImages, 2560, '...');
                ?>

                 {!! $limitedContent !!}


            <div class="flex justify-center">
                <x-button
                    external
                    class="btn-block"
                    icon="o-ellipsis-horizontal-circle"
                    link="{{ singleBlogUrl($blogContent['id'],$blogContent['title']['rendered']) }}"
                    label="ادامه مطلب"
                />
            </div>


        </div>
    @else

    @endif
</div>
