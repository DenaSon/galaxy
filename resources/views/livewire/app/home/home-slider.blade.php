@php
    $slide0 = asset('static/slider/slide1.jpg');
    $slide2 = asset('static/slider/slide2.jpg');
    $slides = [

       [
    'image' => $slide0,
    'title' => 'لیفت‌پال',
    'description' => 'خدمات تخصصی، پشتیبانی دائمی و راهکارهای نوین برای ساختمان‌های مدرن',
    'url' => route('home.blog.indexBlog'),
    'urlText' => 'دانشنامه',

]
,


  [
    'image' => $slide2,
    'title' => 'لوازم آسانسور',
    'description' => 'فروش ویژه لوازم آسانسور با بهترین قیمت و کیفیت! 🚀 ارسال سریع، تضمین اصالت کالا، خرید آسان و مطمئن. 🔧✅',
    'url' => singleCategoryUrl(1,'n/a'),
    'urlText' => 'مشاهده محصولات',
]


    ];
@endphp

<x-carousel without-indicators :slides="$slides" class="hidden md:block z-0 relative text-gray-100">

</x-carousel>
