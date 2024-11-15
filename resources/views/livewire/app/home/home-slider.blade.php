@php
    $slides = [
        [
            'image' => 'https://img.daisyui.com/images/stock/photo-1625726411847-8cbb60cc71e6.webp' ,
            'title' => 'سوغات کوهسار دنا',
            'description' => 'We love last week frameworks.',
            'url' => '/docs/installation',
            'urlText' => 'Get started',
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
