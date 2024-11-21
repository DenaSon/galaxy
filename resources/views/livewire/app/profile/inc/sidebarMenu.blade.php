<x-menu class="border border-dashed">

    <div class="text-center">

        <x-avatar image="https://picsum.photos/200?=2082266265" class="!w-16">

            <x-slot:title class="text-black pl-2">
                {{ $user->first_name }}  {{ $user->last_name }}
            </x-slot:title>

            <x-slot:subtitle class="text-gray-500 flex flex-col gap-1 mt-2 pl-2">
                <x-icon name="o-device-phone-mobile" label="{{ $user->phone }}"/>

            </x-slot:subtitle>

        </x-avatar>

    </div>
    <x-hr/>

    <x-menu-item title="فعالیت‌ها" icon="o-sparkles" link="{{ route('panel.profile.ProfileDashboard') }}"
                 class="{{ request()->routeIs('panel.profile.ProfileDashboard') ? 'active' : '' }}"/>


    <x-menu-item title="آدرس‌ها" icon="o-link-slash"/>

    <x-menu-item title="پیام‌ها" icon="o-envelope"/>

    <x-menu-item title="خروج" icon="o-power" link="{{ route('home.logout') }}"/>
</x-menu>
