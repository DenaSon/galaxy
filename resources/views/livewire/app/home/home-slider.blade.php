@php
    $slide1 = asset('storage/photos/slider/slider1.jpg');
    $slides = [
        [
            'image' => $slide1 ,
            'title' => 'سوغات کوهسار دنا',
            'description' => 'محصولات ارگانیک و تازه، با طعمی اصیل از دل دنا. تجربه خریدی سالم و طبیعی',
            'url' => '/docs/installation',
            'urlText' => 'مشاهده محصولات',
        ],
        [
            'image' => 'https://img.daisyui.com/images/stock/photo-1609621838510-5ad474b7d25d.webp' ,
            'title' => 'Full stack developers',
            'description' => 'Where burnout is just a fancy term for Tuesday.',
        ],
        [
            'image' => "https://img.daisyui.com/images/stock/photo-1414694762283-acccc27bca85.webp" ,
            'url' => '/docs/installation',
            'urlText' => 'Let`s go!',
        ],
        [
            'image' => "https://img.daisyui.com/images/stock/photo-1665553365602-b2fb8e5d1707.webp" ,
            'url' => '/docs/installation',
        ],
    ];
@endphp

<x-carousel :slides="$slides" class="z-0"/>
