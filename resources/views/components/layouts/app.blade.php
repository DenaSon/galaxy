@php
    use App\Models\Category;
    use Illuminate\Support\Facades\Cache;
@endphp

    <!DOCTYPE html>
<html lang="fa" data-theme="light">
<header>
    <head>
        @include('components.layouts.inc.fav-icons')


        <link rel="preload" href="{{ asset('admin/assets/fonts/iransans/woff2/IRANSansWeb(FaNum).woff2') }}"
              as="font" type="font/woff2" crossorigin="anonymous">

        <meta charset="UTF-8">
        <meta name="theme-color" content="#662D91"/>
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
        <meta name="viewport" content="viewport-fit=cover">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? config('app.name') }}</title>

        @stack('SEO')
        @stack('styles')
        @stack('cdn')

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <x-blade-kit.loading/>
    </head>
</header>

<body x-data class="font-sans antialiased" style="font-family: 'tahoma','tahoma', serif !important;">


<!-- Navigation Bar -->
<x-nav class="bg-base-200" dir="rtl">

    <x-slot:actions>
        <!-- Cart Button -->
        <div tabindex="0" role="button" class="btn btn-ghost btn-circle hidden sm:block">
            <div class="indicator">
                <x-button link="{{ route('panel.shop.cart') }}" icon="o-shopping-cart" spinner />
            </div>
        </div>

        <!-- Search Button -->
        <x-button class="md:flex hidden" responsive label="جستجو..."
                  @click.stop="$dispatch('mary-search-open')" icon="o-magnifying-glass"/>

        <!-- Products Dropdown -->
        <x-dropdown label="محصولات" class="sm:text-sm text-xs z-50 font-bold">
            @php
                $categories = Cache::remember('layout-categories', now()->addHour(), function () {
                    return Category::whereNull('parent_id')
                        ->where('type', 'product')
                        ->whereHas('products')
                        ->get();
                });
            @endphp

            <x-menu class="w-52">
                @forelse ($categories as $category)
                    <x-menu-sub title="{{ $category->name }}" icon="o-star">
                        @if ($category->children->isNotEmpty())
                            @include('components.layouts.inc.partials-categories', ['categories' => $category->children])
                        @endif
                    </x-menu-sub>
                @empty
                    <p>هیچ دسته‌ای وجود ندارد.</p>
                @endforelse
            </x-menu>
        </x-dropdown>

        <!-- Login -->
        @livewire('app.system.login')
    </x-slot:actions>

    <!-- Brand Logo -->
    <x-slot:brand>
        <a href="{{ route('home.index-home') }}" wire:navigate.prevent>
            <img loading="lazy" src="{{ asset('static/small-d-logo.png') }}" alt="DenaPax"
                 width="110" height="40" style="height: 40px; width: 110px;"/>
        </a>
    </x-slot:brand>
</x-nav>


<x-main with-nav full-width collapse-text="">
    <x-slot:content dir="rtl">

    {{ $slot }}
        @livewire('app.home.mobile-menu')
        <footer>
            @include('livewire.app.layout.footer')
        </footer>
    </x-slot:content>
</x-main>

<!-- Additional Components -->
<x-spotlight dir="rtl" search-text="جستجو در محصولات" no-results-text="محصول مشابه وجود ندارد"/>
<x-toast/>
{{--@include('components.layouts.inc.analytics-code')--}}
</body>

</html>
