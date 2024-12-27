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

    @stack('cdn')

    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>

<body x-data class="font-sans antialiased" style="font-family: 'denapax-font',serif !important;">

<x-nav class="bg-base-200" dir="rtl">


    <x-slot:actions>


        <div tabindex="0" role="button" class="btn btn-ghost btn-circle hidden sm:block">
            <div class="indicator">
                <x-button link="{{ route('panel.shop.cart') }}" icon="o-shopping-cart"/>
            </div>
        </div>


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
           <img loading="lazy" src="{{ asset('static/small-d-logo.png') }}" alt="DenaPax" width="100" height="45" style="height: 40px;width: 110px"/>
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
