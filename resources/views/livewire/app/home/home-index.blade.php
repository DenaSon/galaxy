<div class="container mx-auto">
    @push('SEO')

        @include('livewire.app.home.inc._seo_schema')

    @endpush
    <div class="flex flex-col md:flex-row md:justify-center items-center space-y-2 md:space-y-0">
        <div class="w-full md:w-4/4 lg:w-3/4">
            @livewire('app.home.home-slider')
        </div>
        <div class="w-full md:w-1/4 hidden lg:block">
            @include('livewire.app.home.home-banner')
        </div>
    </div>

    @livewire('app.home.visual-category-list')

    <h2 class="text-center mt-5 mb-6">
        خدمات لیفت‌پال
    </h2>
    <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-4 lg:grid-cols-4 gap-4 mt-4">

        @livewire('app.component.service-card',
        ['service_title' => 'خدمات ویژه تکنسین‌ها',
        'btn_text' => 'ثبت‌نام تکنسین',
        'action' => 'technician',
        'service_image' => asset('static/services/technician-service.webp'),
        'service_description' => 'لیفت‌پال با ارائه درخواست‌های نصب، تعمیر و نگهداری آسانسور، تکنسین‌ها را به مشتریان متصل می‌کند. دریافت پروژه‌های جدید و مدیریت سفارش‌ها، سریع و آسان!'],

key(uniqid()))


        @livewire('app.component.service-card',
['service_title' => 'مدیریت هوشمند  ساختمان شما',
'btn_text' => 'ثبت ساختمان',
'action' => 'building',
'service_image' => asset('static/services/builder-master.webp'),
'service_description' => '
لیفت‌پال با امکان ثبت اطلاعات ساختمان و ارسال درخواست‌های تعمیر، مدیران را به تکنسین‌های معتبر متصل می‌کند. خدمات حرفه‌ای و پیگیری سفارش‌ها، سریع و آسان!

'],

key(uniqid()))


    </div>


    <h1 class="text-center mt-5 mb-6">
        {{ getSetting('website_title') }}
    </h1>

    <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4 mt-4">
        @foreach($products as $product)
            @livewire('app.component.product-card', ['product' => $product], key('product-'.$product->id))
        @endforeach
    </div>


    @include('livewire.app.home.inc.blog-section')


</div>







