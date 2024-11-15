<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $title ?? '' }}</title>

    @stack('styles')
    @stack('cdn')

    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="{{ asset('admin/assets/fonts/iransans/eot/IRANSansWeb(FaNum)_Light.eot') }}" rel="stylesheet"
          type="text/css"/>

</head>

<body class="font-sans antialiased" style="font-family: IRANSans,serif !important;">


<x-nav sticky full-width>


    <x-slot:brand>

        <label for="main-drawer" class="lg:hidden mr-3">
            <x-icon name="o-bars-3" class="cursor-pointer"/>
        </label>


        <a wire:navigate href="{{ route('home.index-home') }}" class="badge bg-blue-700 text-xs text-white">{{ config('app.name') }}</a>
    </x-slot:brand>

    {{-- Right side actions --}}


    <x-slot:actions dir="rtl">
        <x-button label="پیامها" icon="o-envelope" link="" class="btn-ghost btn-sm" responsive/>
        <x-button label="اعلانات" icon="o-bell" link="#" class="btn-ghost btn-sm" responsive/>


        <x-dropdown label="ایجاد" class="">


            <x-menu-item title=" محصول" link="{{ route('master.shop.create') }}" icon="o-plus"/>
            <x-menu-item title=" بلاگ" link="{{ route('master.blog.create') }}" icon="o-plus"/>
            <x-menu-item title=" دسته بلاگ" link="{{ route('master.blog.categories') }}" icon="o-plus"/>
            <x-menu-item title=" دسته محصول" link="{{ route('master.blog.categories') }}" icon="o-plus"/>

        </x-dropdown>

        <x-theme-toggle darkTheme="dracula" lightTheme="winter"/>
    </x-slot:actions>

</x-nav>


<x-main with-nav full-width collapse-text="">

    <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-200" right dir="rtl">

        {{-- User --}}
        @if($user = auth()->user())


        <x-list-item :item="$user" value="phone"  no-separator no-hover class="pt-2">
            <x-slot:subValue>{{ $user->first_name }} {{ $user->last_name }}</x-slot:subValue>
                <x-slot:actions>
                    <x-button icon="o-power" class="btn-circle btn-ghost btn-xs" tooltip="خروج" no-wire-navigate
                              link="/logout"/>
                </x-slot:actions>
            </x-list-item>

            <x-menu-separator/>
        @endif

        @livewire('admin.template.multi-sidebar')


    </x-slot:sidebar>

    <x-slot:content dir="rtl">
        {{ $slot }}
    </x-slot:content>
</x-main>


<x-toast/>
</body>
</html>
