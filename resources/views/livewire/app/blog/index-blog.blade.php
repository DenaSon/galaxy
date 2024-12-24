<div>

    <div class="container mx-auto">

        @include('livewire.app.blog.inc.indexBlog-nav')

        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6 mt-6">
            @foreach($blogs as $blog)

                @include('livewire.app.component.blog-card')

            @endforeach
        </div>


        @if (count($blogs) >= $per_page)
            <div class="flex justify-center mt-8">
                <x-button label="مشاهده مقالات بیشتر" wire:click="addBlogs" class="mt-5" class="btn-primary" />
            </div>
        @endif


        <x-progress wire:loading class="progress-primary h-0.5" indeterminate/>


    </div>


</div>
