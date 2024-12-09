<div>
    @push('SEO')
        @include('livewire.app.blog.inc.schema-script')
    @endpush
    <article class="container mx-auto lg:px-2 2xl:px-0 mt-2">

        @include('livewire.app.blog.inc.top-menu')

        <div class="flex flex-col lg:flex-row gap-4 mt-4">


            <x-card class="w-full lg:w-1/6 text-center h-auto">

                @foreach($productList as $product)

                    @livewire('app.component.product-card',['product' => $product])

                @endforeach


{{--                @if(isset($post['featured_media']))--}}
{{--                    @php--}}
{{--                        // Get the media URL for the featured image--}}
{{--                        $mediaResponse = Http::get('https://denapax.com/blogpress/wp-json/wp/v2/media/' . $article['featured_media']);--}}
{{--                        $media = $mediaResponse->json();--}}
{{--                        $featuredImageUrl = $media['source_url'] ?? '';--}}
{{--                    @endphp--}}
{{--                    @if($featuredImageUrl)--}}
{{--                        <img src="{{ $featuredImageUrl }}" alt="Featured Image Blog"/>--}}
{{--                    @endif--}}
{{--                @endif--}}

            </x-card>


            <div class="w-full lg:w-5/6 h-auto  mt-5">
                <h1 class="text-center font-black text-2xl mb-3"> {!! $article['title']['rendered'] !!} </h1>

                <div class="!text-sm !font-normal !leading-10 text-justify mb-5 single-blog">
                    {!! $article['content']['rendered'] !!}

                </div>


            </div>

        </div>
    </article>

</div>
