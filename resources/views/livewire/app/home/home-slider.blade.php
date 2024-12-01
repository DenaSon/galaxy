@php
    $slide0 = asset('static/slider/alooo-slider2.jpg');
    $slide1 = asset('static/slider/nuts_slide1.jpg');
    $slide2 = asset('static/slider/slider2.jpg');
    $slides = [

       [
    'image' => $slide0,
    'title' => 'انواع لواشک',
    'description' => 'لواشک‌های خوشمزه و طبیعی دناپکس، طعمی بی‌نظیر از دل طبیعت به خانه شما',
    'url' => singleCategoryUrl(3,'لواشک'),
    'urlText' => 'مشاهده محصولات',
]
,


 [
    'image' => $slide1,
    'title' => 'آجیل مغزها',
    'description' => 'خوشمزه‌ترین و سالم‌ترین تنقلات برای لحظات شاد شما. از مغز گردو تا پسته کوهی',
    'url' => singleCategoryUrl(1,'خشکبار'),
    'urlText' => 'مشاهده محصولات',
]
,

  [
    'image' => $slide2,
    'title' => 'خشکبار خوشمزه',
    'description' => 'محصولات ارگانیک و تازه، سرشار از طعم و خواص عالی برای سلامت شما!',
    'url' => singleCategoryUrl(1,'خشکبار'),
    'urlText' => 'مشاهده محصولات',
]


    ];
@endphp

<x-carousel without-indicators :slides="$slides" class="z-0"/>
