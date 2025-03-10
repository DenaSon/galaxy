<x-menu activate-by-route>
    <x-menu-item title="داشبورد" icon="o-home" link="{{ route('master.dashboard') }}"/>


    <x-menu-sub title="فروشگاه" icon="o-shopping-bag">

        <x-menu-item title="محصولات" icon="o-archive-box-arrow-down" link="{{ route('master.shop.list') }}"/>
        <x-menu-item title="سفارش‌ها" icon="o-queue-list" link="{{ route('master.shop.orders') }}"/>
        <x-menu-item title="قیمت‌ها" icon="o-currency-dollar" link="{{ route('master.shop.price-management') }}"/>
        <x-menu-item title="دسته بندی" icon="o-rectangle-group" link="{{ route('master.shop.categories') }}"/>

        <x-menu-item title="ویژگی‌ها" icon="o-arrows-pointing-in" link="{{ route('master.shop.attribute') }}"/>


        <x-menu-item title="تامین کنندگان" icon="o-user-group" link=""/>
        <x-menu-item title="صفحات" icon="o-book-open" link="{{ route('master.page.createPage') }}"/>

    </x-menu-sub>


    <x-menu-sub title="بلاگ" icon="o-pencil-square">

        <x-menu-item title="ایجاد" icon="o-pencil" link="{{ config('APP_URL') }}/blogpress/wp-admin/post-new.php"
                     external/>
        <x-menu-item title="لیست" icon="o-queue-list" link="{{ config('APP_URL')}}/blogpress/wp-admin/edit.php"
                     external/>
        <x-menu-item title="پیشخوان" icon="o-book-open" link="{{ config('APP_URL') }}/blogpress/wp-admin/index.php"
                     external/>

    </x-menu-sub>


    <x-menu-separator></x-menu-separator>
    <x-menu-item title="تنظیمات" icon="o-cog-8-tooth" link="{{ route('master.setting') }}"/>
    <x-menu-item title="آپلود" icon="o-arrow-up-tray" link="{{ route('master.uploadCenter') }}"/>
</x-menu>
