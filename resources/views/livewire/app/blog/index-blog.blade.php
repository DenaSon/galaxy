<div>
@push('SEO')
    @include('livewire.app.blog.inc.index-blog-schema')
@endpush
    <div class="container mx-auto">

        @include('livewire.app.blog.inc.indexBlog-nav')

        <h1 class="text-xl font-bold text-center py-4 text-primary bg-gray-50 rounded-lg shadow-md">
          <a href="{{ url()->full() }}" wire:navigate>
              مقالات {{ $category_name }}
          </a>
        </h1>



        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6 mt-6">
            @forelse($blogs as $blog)

                @include('livewire.app.component.blog-card')

            @empty
                <div class="flex items-center justify-center">
                    <x-alert title="مقاله ای پیدا نشد" icon="o-eye" class="bg-error text-white"/>
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
