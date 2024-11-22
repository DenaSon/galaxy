<select

    wire:model="selectedCity" class="select select-warning w-full max-w-xs">
    <option disabled selected>انتخاب شهر</option>

    @if($cities)
        @forelse($cities as $city)

            <option value="{{ $city['value'] }}" wire:key="{{ $city['value'] }}">{{ $city['label'] }}</option>
        @empty
        <option disabled>ابتدا یک استان انتخاب کنید</option>
        @endforelse

    @else
        <option disabled>ابتدا یک استان انتخاب کنید</option>
    @endif

</select>



