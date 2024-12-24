<div>

    <div class="container mx-auto">

        @include('livewire.app.blog.inc.indexBlog-nav')

        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6 mt-6">
            @forelse($blogs as $blog)

                @include('livewire.app.component.blog-card')

            @empty

                <div class="flex justify-center">
                    <div class="flex items-center justify-center h-36 w-full max-w-lg border border-gray-300 rounded-md bg-gray-100 px-4">
                        <p class="text-center text-black font-semibold">هیچ مقاله‌ای پیدا نشد.</p>
                    </div>
                </div>




            @endforelse

        </div>


        @if (count($blogs) >= $per_page)
            <div class="flex justify-center mt-8">
                <x-button label="مشاهده مقالات بیشتر" wire:click="addBlogs" class="mt-5" class="btn-primary" />
            </div>
        @endif


        <x-progress wire:loading class="progress-primary h-0.5" indeterminate/>


    </div>


</div>
