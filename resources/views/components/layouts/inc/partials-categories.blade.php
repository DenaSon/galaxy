
@foreach ($categories as $category)
    @if ($category->children->isEmpty())
        <x-menu-item title="{{ $category->name }}" link="{{ singleCategoryUrl($category->id,$category->name) }}" />
    @else
        <x-menu-sub title="{{ $category->name }}">

                @include('components.layouts.inc.partials-categories', ['categories' => $category->children])

        </x-menu-sub>
    @endif
@endforeach
