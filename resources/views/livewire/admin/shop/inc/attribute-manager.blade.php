<div>

    @foreach ($attribute as $index => $attr)
        <div class="flex" wire:key="{{ $attr->id }}">
            <input type="text" wire:model="attribute.{{ $index }}.name" placeholder="نام ویژگی" required>
            <input type="text" wire:model="attribute.{{ $index }}.value" placeholder="مقدار ویژگی" required>
            <button type="button" wire:click="removeAttribute({{ $index }})">حذف</button>
        </div>
    @endforeach


</div>
