<div class="w-full max-w-md mx-auto">
    <a
        class="block relative bg-white overflow-hidden rounded-lg shadow-lg border border-gray-200"

        href="{{ singleBlogUrl($blog['id'],$blog['title']['rendered']) }}">
        <div class="flex flex-col h-24">


            <div class="relative h-20 overflow-hidden p-0">

                @if(isset($blog['featured_image_url']))
                    <img src="{{ $blog['featured_image_url'] }}" alt="{{ $blog['title']['rendered'] }}"
                         class="w-full h-auto">
                @endif

            </div>


            <div class="p-1">
                <div class="text-center">
                    <h2 class="font-normal mt-2 text-xs text-gray-700 leading-snug">
                        {{ $blog['title']['rendered'] }}

                    </h2>
                </div>
            </div>
        </div>
    </a>
</div>
