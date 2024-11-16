<div
    class="fixed bottom-0 left-0 right-0 bg-white border-t border-gray-300 shadow-lg flex justify-around py-2 md:hidden">
    <a wire:navigate href="{{ route('home.index-home') }}" class="text-gray-600 hover:text-blue-500 text-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto" fill="none" viewBox="0 0 24 24"
             stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M3 9.75l9-7.5 9 7.5V18a3 3 0 01-3 3H6a3 3 0 01-3-3V9.75z"/>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 22V12h6v10"/>
        </svg>
        <span class="text-xs">خانه</span>
    </a>
    <a @click.stop="$dispatch('mary-search-open')" class="text-gray-600 hover:text-blue-500 text-center">

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
            <path d="M 10 2 C 5.58 2 2 5.58 2 10 s 3.58 8 8 8 c 1.66 0 3.16 -0.5 4.4 -1.34 l 5.92 5.92 c 0.28 0.28 0.72 0.28 0.99 0 c 0.28 -0.28 0.28 -0.72 0 -0.99 l -5.92 -5.92 C 18 13 19 12 19 10 c 0 -4.42 -3.58 -8 -8 -8 z M 10 14 c -2.21 0 -4 -1.79 -4 -4 s 1.79 -4 4 -4 s 4 1.79 4 4 s -1.79 4 -4 4 z"/>
        </svg>


        <span @click.stop="$dispatch('mary-search-open')" class="text-xs">جستجو</span>
    </a>
    <a href="#cart" class="text-gray-600 hover:text-blue-500 text-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto" fill="none" viewBox="0 0 24 24"
             stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M5 5h14l1 8H6l-1-8zm7 13a2 2 0 100-4 2 2 0 000 4zm4-2h2a2 2 0 100-4h-2a2 2 0 100 4z"/>
        </svg>
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
