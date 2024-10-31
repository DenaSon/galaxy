
<x-menu activate-by-route>
    <x-menu-item title="داشبورد" icon="o-home" link="{{ route('master.dashboard') }}" />


    <x-menu-sub title="بلاگ" icon="o-pencil-square">

        <x-menu-item  title="ایجاد" icon="o-pencil" link="{{ route('master.blog.create') }}" />
        <x-menu-item title="لیست" icon="o-queue-list" link="{{ route('master.blog.list') }}" />
        <x-menu-item title="دسته" icon="o-book-open" link="{{ route('master.blog.categories') }}" />

    </x-menu-sub>

</x-menu>
