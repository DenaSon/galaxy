<div class="w-full max-w-md mx-auto">
    @foreach($blogs as $post)
        <!-- Iterating over the posts -->
    <a @if(request()->routeIs('home.blog.indexBlog')) wire:navigate @endif
    class="block relative bg-white overflow-hidden rounded-lg shadow-lg border border-gray-200"
       href="{{ route('singleBlog', ['id' => $post->id, 'title' => $post->slug]) }}">
        <div class="flex flex-col h-48 shadow-xl">
            <div class="relative h-40 overflow-hidden p-0">
                @if($post->featuredImage)
                    <!-- Checking if there's a featured image -->
                    <img loading="lazy" src="{{ $post->featuredImage->url }}" alt="{{ $post->title }}"
                         class="w-full h-auto">
                @endif
            </div>

            <div class="p-1">
                <div class="text-center">
                    <h2 class="mt-2 text-xs text-gray-700 leading-snug font-black">
                        {{ $post->title }} <!-- Displaying post title -->
                    </h2>
                </div>
            </div>
        </div>
    </a>
    @endforeach
</div>
