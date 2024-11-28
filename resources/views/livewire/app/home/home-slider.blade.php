@php
    $slide1 = asset('static/slider/slider-nuts.JPG');
    $slide2 = asset('static/slider/slider2.jpg');
    $slides = [
 [
    'image' => $slide1,
    'title' => 'تنقلات',
    'description' => 'خوشمزه‌ترین و سالم‌ترین تنقلات برای لحظات شاد شما. از مغزها تا چیپس‌های خانگی!',
    'url' => singleCategoryUrl(1,'تنقلات'),
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

<x-carousel without-arrows without-indicators :slides="$slides" class="z-0"/>
