@php use App\Models\Category; @endphp
    <!DOCTYPE html>
<html lang="fa">
<head>

    @include('components.layouts.inc.fav-icons')

    @include('components.layouts.inc.analytics-code')

    <link rel="preload" href="{{asset('admin/assets/fonts/iransans/woff2/IRANSansWeb(FaNum).woff2')}}" as="font"
          type="font/woff2" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $title ?? config('app.name') }}</title>
    @stack('SEO')
    @stack('styles')

    <style>
        @font-face {
            font-family: 'denapax-font';
            src: url('{{asset('admin/assets/fonts/iransans/woff2/IRANSansWeb(FaNum).woff2')}}') format('woff2'),
            url('{{ asset('admin/assets/fonts/iransans/woff/IRANSansWeb(FaNum).woff') }}') format('woff');
        url('{{ asset('admin/assets/fonts/iransans/ttf/IRANSansWeb(FaNum).ttf') }}') format('woff');
            font-weight: normal;
            font-style: normal;
        }

        ::-webkit-scrollbar {
            width: 12px;
        }

        ::-webkit-scrollbar-thumb {
            background-color: #888;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background-color: #555;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }


        * {
            scrollbar-width: thin;
            scrollbar-color: #888 #f1f1f1;
        }


        body {
            -ms-overflow-style: scrollbar;
        }

        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield;
        }

    </style>


    @stack('cdn')

    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>

<body x-data class="font-sans antialiased" style="font-family: 'denapax-font',serif !important;">

<x-nav class="bg-base-200" dir="rtl">


    <x-slot:actions>


        <x-button responsive icon="o-shopping-cart" link="{{ route('panel.shop.cart') }}" label="سبد خرید"
                  class="text-primary"/>


        <x-button class=" md:flex hidden" responsive label="جستجو..." @click.stop="$dispatch('mary-search-open')"
                  icon="o-magnifying-glass"/>


        <x-dropdown label="محصولات" class="sm:text-sm text-xs z-50 font-bold"
                    style="z-index: 1000 !important;position: relative !important;">
            @php


                $categories = \Illuminate\Support\Facades\Cache::remember('layout-categories', now()->addMinutes(60), function () {
                    return Category::whereNull('parent_id')
                    ->where('type','product')
                    ->whereHas('products')
                        ->get();
                });
            @endphp
            <x-menu class="w-52 z-50">

                @if ($categories->isNotEmpty())

                    @foreach ($categories as $category)
                        <x-menu-sub title="{{ $category->name }}" icon="o-star">
                            @if ($category->children->isNotEmpty())

                                @include('components.layouts.inc.partials-categories', ['categories' => $category->children])

                            @endif
                        </x-menu-sub>
                    @endforeach

                @else
                    <p>هیچ دسته‌ای وجود ندارد.</p>
                @endif


            </x-menu>

        </x-dropdown>

        @livewire('app.system.login')


    </x-slot:actions>

    <x-slot:brand>

        <a href="{{ route('home.index-home') }}" wire:navigate>
            <img src="{{ asset('static/small-d-logo.png') }}" alt="DenaPax" style="height: 40px"/>
        </a>

    </x-slot:brand>


</x-nav>


<x-main with-nav full-width collapse-text="">

    <x-slot:content dir="rtl">
        {{ $slot }}

        @livewire('app.home.mobile-menu')
        @include('livewire.app.layout.footer')


    </x-slot:content>
</x-main>

<x-spotlight dir="rtl" search-text="جستجو در محصولات" no-results-text="محصول مشابه وجود ندارد"/>
<x-toast/>


</body>
</html>
