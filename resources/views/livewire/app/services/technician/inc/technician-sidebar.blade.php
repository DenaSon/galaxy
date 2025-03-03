<x-menu class="border border-dashed">

    <x-stat title="درخواست ها" value="44" icon="o-user-group" tooltip="درخواست های کارفرما"/>

    <hr/>

    <x-menu-item external title="خانه" icon="o-home" link="{{ route('home.index-home') }}"/>

    <x-menu-item external title="آموزش" icon="o-clipboard-document-list" badge-classes="float-right"
                 link="{{ route('home.blog.indexBlog',['category'=>1]) }}"/>

    <x-menu-item external title="فروشگاه" icon="o-shopping-bag"
                 link="{{ route('home.product.indexStore') }}"
                 badge="new" badge-classes="!badge-warning"/>


    <x-menu-item title="خروج" icon="o-power" link="{{ route('home.logout') }}"
                 no-wire-navigate/>
</x-menu>
