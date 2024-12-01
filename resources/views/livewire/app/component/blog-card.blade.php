<div class="w-full max-w-md mx-auto">
    <a
        class="block relative bg-white overflow-hidden rounded-lg shadow-lg hover:shadow-2xl transform hover:scale-100 transition-all duration-300 border border-gray-200"
        wire:navigate
        href="{{ singleBlogUrl($blog,$blog->title) }}">
        <div class="flex flex-col h-full">


            <div class="relative h-20 overflow-hidden p-2">

                <img
                    src="{{ $blog->images->first()->file_path }}"
                    class="w-full h-full object-cover rounded-t-lg "
                    alt="{{ $blog->title }}"
                />

{{--                                <x-badge--}}
{{--                                    value="{{ $blog->categories->first()->name }}"--}}
{{--                                    class="absolute top-3 left-3  text-xs px-3 py-1 rounded-lg shadow-md font-medium"/>--}}
            </div>


            <div class="p-1">
                <div class="text-center">
                    <h2 class="font-normal mt-2 text-xs text-gray-700 leading-snug">
                        {{ $blog->title }}
                    </h2>
                </div>
            </div>
        </div>
    </a>
</div>
