
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
    <link href="{{ asset('admin/assets/fonts/iransans/eot/IRANSansWeb(FaNum)_Light.eot') }}" rel="stylesheet" type="text/css" />

</head>

<body class="font-sans antialiased" style="font-family: IRANSans,serif !important;">



<x-nav sticky full-width>



    <x-slot:brand>

        <label for="main-drawer" class="lg:hidden mr-3">
            <x-icon name="o-bars-3" class="cursor-pointer" />
        </label>


        <div>{{ config('app.name') }}</div>
    </x-slot:brand>

    {{-- Right side actions --}}



    <x-slot:actions dir="rtl">
        <x-button label="پیامها" icon="o-envelope" link="" class="btn-ghost btn-sm" responsive />
        <x-button label="اعلانات" icon="o-bell" link="#" class="btn-ghost btn-sm" responsive />

        <x-theme-toggle darkTheme="dracula" lightTheme="winter" />



    </x-slot:actions>

</x-nav>


<x-main with-nav full-width>

    <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-200" right dir="rtl">

        {{-- User --}}
        @if($user = auth()->user())
            <x-list-item :item="$user" value="name" sub-value="email" no-separator no-hover class="pt-2">
                <x-slot:actions>
                    <x-button icon="o-power" class="btn-circle btn-ghost btn-xs" tooltip-left="logoff" no-wire-navigate link="/logout" />
                </x-slot:actions>
            </x-list-item>

            <x-menu-separator />
        @endif

        @livewire('admin.template.multi-sidebar')


    </x-slot:sidebar>

    <x-slot:content dir="rtl">
        {{ $slot }}

    </x-slot:content>
</x-main>


<x-toast />
</body>
</html>
