<div
    class="fixed bottom-0 left-0 right-0 bg-white border-t border-gray-300 shadow-lg flex justify-around py-2 md:hidden">
    <a wire:navigate href="{{ route('home.index-home') }}" class="text-gray-600 hover:text-blue-500 text-center">
        <x-icon name="o-home" class="w-5 h-5" />
        <div class="clear-both"></div>
        <span class="text-xs">خانه</span>
    </a>
    <a @click.stop="$dispatch('mary-search-open')" class="text-gray-600 hover:text-blue-500 text-center">

        <x-icon name="o-magnifying-glass" class="w-5 h-5" />
        <div class="clear-both"></div>

        <span @click.stop="$dispatch('mary-search-open')" class="text-xs">جستجو</span>
    </a>


    <a href="#cart" class="text-gray-600 hover:text-blue-500 text-center">
        <x-icon name="o-shopping-cart" class="w-5 h-5" />
        <div class="clear-both"></div>
        <span class="text-xs">سبد‌خرید</span>
    </a>


    @if(Auth::check())
        <a wire:navigate href="{{ route('master.dashboard') }}" class="text-gray-600 hover:text-blue-500 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 12c2.97 0 4-2.03 4-4s-1.03-4-4-4-4 2.03-4 4 1.03 4 4 4zm0 0c-3.87 0-7 3.13-7 7h14c0-3.87-3.13-7-7-7z"/>
            </svg>
            <span class="text-xs">پروفایل</span>
        </a>
    @endif
</div>
