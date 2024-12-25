<x-nav sticky full-width>

    <x-slot:brand>
        <h1 class="font-black text-lg">
            دانشنامه |
        </h1>

        <div class="grid-flow-col auto-cols-max gap-x-6 justify-center mr-2 hidden md:grid">
            @foreach($categories_list as $category)
                <x-button
                    link="{{ route('home.blog.indexBlog',['category'=>$category['id']]) }}"
                    class="btn-xs font-thin text-gray-500 bg-gray-100 hover:bg-primary hover:text-white rounded-lg shadow-md transition duration-200"
                    label="{{ $category['name'] }}"
                    badge="{{ $category['count'] }}"
                    responsive
                    badge-classes="bg-gray-500 text-white rounded-full  text-xs border-gray-500"
                />

            @endforeach
        </div>

    </x-slot:brand>


    <x-slot:actions>

        <x-input label="جستجو در دانشنامه" inline wire:model.live.debounce.500ms="searchTerm"/>


    </x-slot:actions>
</x-nav>
<x-progress wire:loading class="progress-primary h-0.5" indeterminate/>

