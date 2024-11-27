@php
    $slide1 = asset('static/slider/slider-nuts.JPG');
    $slides = [
        [
            'image' => $slide1 ,
            'title' => 'خشکبار خوشمزه',
            'description' => 'محصولات ارگانیک و تازه، ',
            'url' => singleCategoryUrl(1,'خشکبار'),

            'urlText' => 'مشاهده محصولات',
        ],
    ];
@endphp

<x-carousel :slides="$slides" class="z-0"/>
