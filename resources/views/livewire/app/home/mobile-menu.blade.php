<div>

    <div class="btm-nav md:hidden border border-gray-100 rounded">


        <a wire:navigate role="button" href="{{ homeUrl() }}" class="hover:text-primary">
            <x-icon name="o-home"/>
            <span class="text-xs">خانه</span>
        </a>


        <a role="button" href="{{ homeUrl() }}" class="hover:text-primary">
            <div class="indicator">
                <span class="indicator-item badge badge-primary badge-xs">5</span>

                <x-icon name="o-shopping-cart"/>
            </div>

            <span class="text-xs">سبد خرید</span>
        </a>


        <a @click.stop="$dispatch('mary-search-open')" role="button"  class="hover:text-primary">
            <x-icon name="o-magnifying-glass"/>
            <span class="text-xs"> جستجو</span>
        </a>

        @if(!Auth::check())
            <a role="button" href="{{ homeUrl() }}" class="hover:text-primary">
                <x-icon name="o-user-plus"/>
                <span class="text-xs"> ورود | ثبت نام</span>
            </a>
        @else
            <a  role="button" href="{{ homeUrl() }}" class="hover:text-primary">
                <x-icon name="o-user-circle"/>
                <span class="text-xs"> پروفایل</span>
            </a>
        @endif


    </div>


</div>
