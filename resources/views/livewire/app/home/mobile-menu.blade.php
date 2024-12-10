<div>

    <div class="btm-nav md:hidden border border-gray-100 rounded" style="z-index: 10001">


        <a wire:navigate role="button" href="{{ homeUrl() }}" class="hover:text-primary">
            <x-icon name="o-home"/>
            <span class="text-xs">خانه</span>
        </a>

        @if(!Auth::check() || \App\Models\Cart::count() < 1)
            <a  @click.stop="$wire.toaster" role="button"  class="hover:text-primary">
                <div class="indicator">
                    <span class="indicator-item badge badge-primary badge-xs">0</span>

                    <x-icon name="o-shopping-cart"/>
                </div>
                <span class="text-xs">سبد خرید</span>
            </a>
        @else
            <a wire:navigate href="{{ route('panel.shop.cart') }}" role="button" class="hover:text-primary">
                <div x-data="{ cartCount: @entangle('cartCount') }" class="indicator">
                    <span x-text="cartCount" class="indicator-item badge badge-primary badge-xs"></span>
                    <x-icon name="o-shopping-cart"/>
                </div>
                <span class="text-xs">سبد خرید</span>
            </a>

        @endif

        <a @click.stop="$dispatch('mary-search-open')" role="button"  class="hover:text-primary">
            <x-icon name="o-magnifying-glass"/>
            <span class="text-xs"> جستجو</span>
        </a>

        @if(!Auth::check())
            <a role="button"  class="hover:text-primary" wire:click="openLogin">
                <x-icon name="o-user-plus"/>
                <span class="text-xs">ورود | ثبت‌نام</span>
            </a>
        @else
            <a  role="button" href="{{ route('panel.profile.profileDashboard') }}" class="hover:text-primary">
                <x-icon name="o-user-circle"/>
                <span class="text-xs"> پروفایل</span>
            </a>
        @endif


    </div>


</div>
