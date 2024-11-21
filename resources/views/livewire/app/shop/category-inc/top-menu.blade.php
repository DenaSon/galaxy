<div class="w-full flex justify-between items-center">
    <!-- بخش اول -->
    <div class="breadcrumbs text-sm">
        <ul class="text-xs">
            <li><a wire:navigate href="{{ route('home.index-home') }}">صفحه اول</a></li>
            <li><a wire:navigate href="{{ singleCategoryUrl($category->id, $category->name) }}">{{ $category->name }}</a></li>

            @if($category->children->isNotEmpty())
                <li>
                    <a wire:navigate href="{{ singleCategoryUrl($category->children->first()->id, $category->children->first()->name) }}">
                        {{ $category->children->first()->name }}
                    </a>
                </li>
            @endif
        </ul>
    </div>

    <!-- بخش دوم -->
    <div class="text-sm text-right">
        <p>
            <x-rating disabled wire:model="ranking" class="bg-warning" total="5" />

        </p>
    </div>
</div>
