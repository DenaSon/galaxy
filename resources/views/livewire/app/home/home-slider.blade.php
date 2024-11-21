@php
    $slide1 = asset('storage/photos/slider/slider1.jpg');
    $slides = [
        [
            'image' => 'https://picsum.photos/500/200' ,
            'title' => 'سوغات کوهسار دنا',
            'description' => 'محصولات ارگانیک و تازه، با طعمی اصیل از دل دنا',
            'url' => '/docs/installation',
            'urlText' => 'مشاهده محصولات',
        ],
        [
            'image' => 'https://picsum.photos/500/300' ,
            'title' => 'Full stack developers',
            'description' => 'Where burnout is just a fancy term for Tuesday.',
        ],
        [
            'image' => "https://picsum.photos/500/400" ,
            'url' => '/docs/installation',
            'urlText' => 'Let`s go!',
        ],
        [
            'image' => "https://picsum.photos/400/200" ,
            'url' => '/docs/installation',
        ],
    ];
@endphp

<x-carousel :slides="$slides" class="z-0"/>
