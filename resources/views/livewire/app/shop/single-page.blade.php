<div>
    @push('SEO')
        @include('livewire.app.shop.page-inc.seo')
    @endpush
    <article class="container mx-auto lg:px-2 2xl:px-0 mt-2">

        <div class="w-full border rounded-box p-2 pt-3">

            <x-icon name="o-clock" label="{{ getArticleReadTime($page->content,650) }} دقیقه زمان  مطالعه" class="text-xs text-violet-400"/>
            &nbsp;
            <x-icon name="o-tag" label="دسته : {{ $page->categories->first()->name }} " class="text-xs text-violet-400"/>


        </div>


        <div class="flex flex-col lg:flex-row gap-4 mt-4">


            @include('livewire.app.blog.inc.blog-image')


            <div class="w-full lg:w-5/6 h-auto  mt-5">
                <h1 class="text-center font-black text-2xl mb-3"> {{ $page->title }}</h1>

                <div class="!text-sm !font-normal !leading-9 text-justify mb-5">
                    {!! $page->content !!}
                </div>


            </div>

        </div>
    </article>

</div>