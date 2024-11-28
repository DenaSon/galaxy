@php use App\Models\Category; @endphp
<!DOCTYPE html>
<html lang="fa" data-theme="light">
<head>
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

        .loader {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #ffffff;
            z-index: 1000000000;
        }

        .loader svg {
            display: block;
            shape-rendering: auto;
            animation: turn 1s linear infinite;
        }

        .loader svg path {
            fill: #7286a2;
        }

        @keyframes turn {
            0% {
                transform: rotate(0deg)
            }
            100% {
                transform: rotate(360deg)
            }
        }

    </style>
    <div class="loader" role="loader">
        <svg width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
            <path d="M35 50A15 15 0 0 0 65 50A15 16.5 0 0 1 35 50" stroke="none">
                <animateTransform attributeName="transform" type="rotate" dur="1s" repeatCount="indefinite" keyTimes="0;1" values="0 50 50.75;360 50 50.75"/>
            </path>
        </svg>
    </div>

    @stack('cdn')

    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>

<body x-data class="font-sans antialiased" style="font-family: 'denapax-font',serif !important;">

<x-nav class="bg-base-200" dir="rtl">


    <x-slot:actions>
        <x-button class=" md:flex hidden" responsive label="جستجو..." @click.stop="$dispatch('mary-search-open')"
                  icon="o-magnifying-glass"/>


        <x-dropdown label="دسته‌بندی" class="sm:text-sm text-xs">
            @php


                $categories = \Illuminate\Support\Facades\Cache::remember('layout-categories', now()->addMinutes(60), function () {
                    return Category::whereNull('parent_id')
                    ->where('type','product')
                    ->whereHas('products')
                        ->get();
                });
            @endphp
            <x-menu class="w-52">

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

        <x-button link="{{ route('home.index-home') }}"
                  class="bg-blue-700 text-xs  btn-xs text-white hover:bg-blue-500">{{ config('app.name') }}</x-button>
    </x-slot:brand>


</x-nav>


<x-main with-nav full-width collapse-text="">

    <x-slot:content dir="rtl">
        {{ $slot }}

        @if(auth()->check() && auth()->user()->carts()->count('id') > 0)
            @livewire('app.component.cart-box')
        @endif
        @livewire('app.home.mobile-menu')
        @include('livewire.app.layout.footer')
        <script defer>
            document.onreadystatechange = function() {
                if (document.readyState !== "complete") {
                    document.body.style.visibility = "hidden";
                    document.querySelector('[role="loader"]').style.visibility = "visible";
                } else {
                    document.querySelector('[role="loader"]').style.display = "none";
                    document.body.style.visibility = "visible";
                }
            };

        </script>
    </x-slot:content>
</x-main>

<x-spotlight dir="rtl" search-text="جستجو در محصولات" no-results-text="محصول مشابه وجود ندارد"/>
<x-toast/>
</body>
</html>
