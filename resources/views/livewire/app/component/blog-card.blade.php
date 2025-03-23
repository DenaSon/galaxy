<div class="w-full max-w-md mx-auto" wire:key="{{ $blog->ID }}">
    <a @if(request()->routeIs('home.blog.indexBlog')) wire:navigate @endif
    class="block relative bg-white overflow-hidden rounded-lg shadow-lg border border-gray-200"
       href="{{ slugMaker($blog->post_title) }}">
        <div class="flex flex-col h-48 shadow-xl">
            <div class="relative h-40 overflow-hidden p-0">
                @if(isset($blog->thumbnail))
                    <img loading="lazy" src="{{ $blog->thumbnail }}" alt="{{ $blog->post_title }}"
                         class="w-full h-auto">
                @endif
            </div>
            <div class="p-1">
                <div class="text-center">
                    <h2 class="mt-2 text-xs text-gray-700 leading-snug font-black">
                        {{ $blog->post_title }}
                    </h2>
                </div>
            </div>
        </div>
    </a>
</div>
