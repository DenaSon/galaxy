<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $title ?? config('app.name') }}</title>

    @stack('styles')

    <style>
        @font-face {
            font-family: 'denapax-font';
            src: url('{{asset('admin/assets/fonts/iransans/woff2/IRANSansWeb(FaNum)_Black.woff2.woff2')}}') format('woff2'),
            url('{{ asset('admin/assets/fonts/iransans/woff/IRANSansWeb(FaNum)_Black.woff.woff') }}') format('woff');
            font-weight: normal;
            font-style: normal;
        }
    </style>


    @stack('cdn')

    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>

<body x-data class="font-sans antialiased" style="font-family: 'denapax-font',serif !important;">

<x-nav class="bg-base-200">

    <x-slot:brand>

        <x-button link="{{ route('home.index-home') }}" class="bg-blue-700 text-xs  btn-xs text-white hover:bg-blue-500">{{ config('app.name') }}</x-button>
    </x-slot:brand>

    {{-- Right side actions --}}


    <x-slot:actions dir="rtl">
        <x-button responsive label="جستجو..." @click.stop="$dispatch('mary-search-open')" icon="o-magnifying-glass"/>


        <x-dropdown label="دسته‌بندی" class="">


            <x-menu-item title=" محصول" link="{{ route('master.shop.create') }}" icon="o-plus"/>
            <x-menu-item title=" بلاگ" link="{{ route('master.blog.create') }}" icon="o-plus"/>
            <x-menu-item title=" دسته بلاگ" link="{{ route('master.blog.categories') }}" icon="o-plus"/>
            <x-menu-item class="-z-10" title=" دسته محصول" link="{{ route('master.blog.categories') }}" icon="o-plus"/>

        </x-dropdown>

        @livewire('app.system.login')


    </x-slot:actions>

</x-nav>


<x-main with-nav full-width collapse-text="">

    <x-slot:content dir="rtl">
        {{ $slot }}
        @livewire('app.component.cart-box')
        @livewire('app.home.mobile-menu')
        @include('livewire.app.layout.footer')
    </x-slot:content>
</x-main>

<x-spotlight dir="rtl" search-text="جستجو در محصولات" no-results-text="محصول مشابه وجود ندارد"/>
<x-toast/>
</body>
</html>
