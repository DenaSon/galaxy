<div>
    <article class="container mx-auto lg:px-2 2xl:px-0 mt-2">

        <div class="flex flex-col lg:flex-row gap-4 mt-4">

            <div class="w-full lg:w-5/6 h-auto  mt-5">
                <h1 class="text-center font-black text-2xl mb-3"> {{ $page->title }}</h1>

                <div class="!text-sm !font-normal !leading-9 text-justify mb-5">
                    {!! $page->content !!}
                </div>

            </div>

        </div>
    </article>

</div>
@push('SEO')
    {!! $page->schema !!}
@endpush
