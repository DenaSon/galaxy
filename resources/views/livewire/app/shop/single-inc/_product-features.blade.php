<div class="overflow-x-auto" wire:init="loadAttributes">

    <table class="table w-full border border-gray-200 rounded-lg rtl">
        <!-- Table Header -->
        <thead class="bg-gray-100">
        <tr>
            <th class="px-6 py-3 text-right text-sm font-semibold text-gray-700">نام ویژگی</th>
            <th class="px-6 py-3 text-right text-sm font-semibold text-gray-700">مقدار</th>
        </tr>
        </thead>
        <!-- Table Body -->
        <tbody>
        @foreach($features as $attribute)
          @if($attribute->pivot->value != 'null')
              <tr class="hover:bg-gray-50">
                  <td class="px-6 py-4 text-sm text-right text-gray-800">{{ $attribute->name }}</td>
                  <td class="px-6 py-4 text-sm text-right text-gray-800">{{ $attribute->pivot->value }}</td>
              </tr>
          @endif
        @endforeach
        </tbody>
    </table>
</div>
