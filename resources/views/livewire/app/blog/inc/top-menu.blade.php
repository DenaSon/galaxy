<div class="w-full border rounded-box p-2 pt-3">

    <x-icon name="o-clock" label="{{ getArticleReadTime($blog->content,650) }} دقیقه زمان  مطالعه" class="text-xs text-violet-400"/>
    &nbsp;
    <x-icon name="o-tag" label="دسته : {{ $blog->categories->first()->name }} " class="text-xs text-violet-400"/>


</div>
