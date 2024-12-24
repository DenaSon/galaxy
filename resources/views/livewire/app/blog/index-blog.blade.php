<div>

    <div class="container mx-auto">

        @include('livewire.app.blog.inc.indexBlog-nav')

        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6 mt-6">
            @foreach($blogs as $blog)

                @include('livewire.app.component.blog-card')

            @endforeach
        </div>


        @if (count($blogs) >= $per_page)
        <x-button label="مشاهده مقالات بیشتر" wire:click="addBlogs" class="mt-5 text-center items-center"/>
        @endif

        <div wire:loading>
            <span>Loading...</span> <!-- Show loading spinner if needed -->
        </div>


    </div>


</div>
