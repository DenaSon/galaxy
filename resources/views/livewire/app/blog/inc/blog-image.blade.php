<x-card class="w-full lg:w-1/6 text-center h-72">

    <img
        src="{{ asset('storage/'.$blog->images->first()->file_path) }}"
        alt=""
        class="w-full h-full object-cover rounded-md"
    />

</x-card>
