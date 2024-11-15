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
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto" fill="none" viewBox="0 0 24 24"
             stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M8 4a4 4 0 014 4m0 0a4 4 0 11-4-4m4 4v1a4 4 0 11-4 4m8 4h2m-1-1h.01M4 4l5 5m2-2l7 7"/>
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
    <a href="#profile" class="text-gray-600 hover:text-blue-500 text-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto" fill="none" viewBox="0 0 24 24"
             stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 12c2.97 0 4-2.03 4-4s-1.03-4-4-4-4 2.03-4 4 1.03 4 4 4zm0 0c-3.87 0-7 3.13-7 7h14c0-3.87-3.13-7-7-7z"/>
        </svg>
        <span class="text-xs">پروفایل</span>
    </a>
</div>
