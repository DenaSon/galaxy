@foreach ($categories as $category)
    @if ($category->children->isEmpty())
        <x-menu-item class="z-50" title="{{ $category->name }}" link="{{ singleCategoryUrl($category->id,$category->name) }}" />
    @else
        <x-menu-sub class="z-50" title="{{ $category->name }}">

                @include('components.layouts.inc.partials-categories', ['categories' => $category->children])

        </x-menu-sub>
    @endif
@endforeach
