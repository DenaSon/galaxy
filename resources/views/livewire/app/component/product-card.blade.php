<div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-200">
    <a href="{{ singleProductUrl($product->id, $product->name) }}" wire:navigate>
        <x-card>
            <x-slot:title class="text-sm font-thin hidden sm:block">
                {{ $product->name }}
            </x-slot:title>

            <x-slot:figure class="relative group">
                <img src="{{ asset($product->images->first()->file_path ?? 'https://picsum.photos/500/200') }}"
                     class="w-full h-52 md:h-64 object-cover rounded-lg shadow-lg group-hover:scale-105 transition-all duration-300 ease-in-out opacity-95 group-hover:opacity-100"
                     alt="{{ $product->name }}" />

                <div class="absolute inset-0 bg-black opacity-5"></div>

                <div class="absolute top-0 right-0 p-3 flex space-x-2">
                    @if(Auth::check() && !Auth::user()->favorites->pluck('id')->contains($product->id))
                        <x-button role="button" data-tip="موردعلاقه" spinner="addFavorite" wire:click="addFavorite({{ $product->id }})"
                                  icon="o-heart"
                                  class="tooltip tooltip-left btn-circle btn-xs bg-opacity-10 text-white" />
                    @else
                        <x-button role="button" data-tip="حذف از مورد علاقه" spinner="removeFavorite"
                                  wire:click="removeFavorite({{ $product->id }})"
                                  icon="o-heart"
                                  class="tooltip tooltip-left btn-circle btn-xs bg-opacity-10 text-white" />
                    @endif
                </div>

                @if($product->discount > 0)
                    <div class="absolute top-0 left-0 p-3 flex space-x-2">
                        <x-badge value="{{ $product->discount ?? 0 }}%"
                                 class="hidden sm:block badge badge-error text-white" />
                    </div>
                @endif

                <div class="absolute bottom-0 right-0 p-3 flex space-x-2 sm:hidden">
                    <span class="text-xs font-thin rounded border-gray-700 bg-gray-100 p-2 opacity-80">
                        {{ $product->name }}
                    </span>
                </div>
            </x-slot:figure>

            <div class="sm:hidden text-center p-0">
                <span class="tooltip font-bold" data-tip="تومان">
                    {{ number_format($product->variants->min('price') ?? 0) }}
                </span>
                <x-icon name="o-check-badge"></x-icon>
            </div>
        </x-card>
    </a>
</div>
