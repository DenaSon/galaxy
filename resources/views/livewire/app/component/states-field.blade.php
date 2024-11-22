<select wire:ignore wire:model.live.debounce.50ms="selectedState" class="select select-warning w-full max-w-xs">
    <option disabled selected>انتخاب استان</option>

    @if($states)
        @forelse($states as $state)

            <option value="{{ $state['value'] }}" wire:key="{{ $state['value'] }}">{{ $state['label'] }}</option>
        @empty
        @endforelse
    @else

    @endif

</select>



