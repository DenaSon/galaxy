<div>
    @push('SEO')
        @include('livewire.app.blog.inc.schema-script')
    @endpush
    <article class="container mx-auto lg:px-2 2xl:px-0 mt-2">

        @include('livewire.app.blog.inc.top-menu')

        <div class="flex flex-col lg:flex-row gap-4 mt-4">


            @include('livewire.app.blog.inc.blog-image')


            <div class="w-full lg:w-5/6 h-auto  mt-5">
                <h1 class="text-center font-black text-2xl mb-3"> {{ $blog->title }}</h1>

                <div class="!text-sm !font-normal !leading-9 text-justify mb-5">
                    {!! $blog->content !!}
                </div>


            </div>

        </div>
    </article>

</div>
