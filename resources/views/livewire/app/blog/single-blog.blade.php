<div>
    @push('SEO')
        @include('livewire.app.blog.inc.schema-script')
    @endpush
    <article class="container mx-auto lg:px-2 2xl:px-0 mt-2">

        @include('livewire.app.blog.inc.top-menu')

        <div class="flex flex-col lg:flex-row gap-4 mt-4">


            <x-card class="w-full lg:w-1/6 text-center h-auto hidden sm:block">

                @foreach($productList as $product)

                    <div class="mt-2">
                        @livewire('app.component.product-card',['product' => $product])
                    </div>

                @endforeach


                {{--                @if(isset($post['featured_media']))--}}
                {{--                    @php--}}
                {{--                        // Get the media URL for the featured image--}}
                {{--                        $mediaResponse = Http::get('https://liftpal.ir/blogpress/wp-json/wp/v2/media/' . $article['featured_media']);--}}
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

                <div class="!text-sm !font-normal  text-justify mb-5 single-blog p-3">

                    {!! $article['content']['rendered'] !!}


                    <div class="bg-gray-50 p-6 rounded-lg shadow-lg mt-4">
                        <h2 class="text-xl font-bold text-gray-400 border-b-2 border-indigo-500 pb-2 mb-4">
                            مقالات پیشنهادی
                        </h2>
                        <ul class="space-y-3">
                            @foreach ($suggestedArticles as $suggestedArticle)
                                <li>
                                    <a wire:navigate
                                       href="{{ route('home.blog.singleBlog', ['blog' => $suggestedArticle['id'], 'slug' => slugMaker( $suggestedArticle['title']['rendered']) ]) }}"
                                       class="block text-sm text-indigo-600 hover:text-indigo-800 hover:underline transition">
                                        {{ $suggestedArticle['title']['rendered'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>


                </div>


            </div>

        </div>
    </article>

</div>
