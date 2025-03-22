<div class="w-full max-w-md mx-auto" wire:key="{{$blog->id}}">
    <a @if(request()->routeIs('home.blog.indexBlog')) wire:navigate @endif
    class="block relative bg-white overflow-hidden rounded-lg shadow-lg border border-gray-200"
       href="{{ singleBlogUrl($blog->id, $blog->title) }}">
        <div class="flex flex-col h-48 shadow-xl">

            <div class="relative h-40 overflow-hidden p-0">
                @if(isset($blog->featured_image_url))
                    <img loading="lazy" src="{{ $blog->featured_image_url }}" alt="{{ $blog->title }}"
                         class="w-full h-auto">
                @endif
            </div>

            <div class="p-1">
                <div class="text-center">
                    <h2 class="mt-2 text-xs text-gray-700 leading-snug font-black">
                        {{ $blog->title }}
                    </h2>
                </div>
            </div>
        </div>
    </a>
</div>
