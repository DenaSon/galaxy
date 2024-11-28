<div>

    <x-menu-separator/>

    <div>
        <div class="flex flex-col md:flex-row md:space-x-4">

            <div class="w-full md:w-full shadow-lg m-2">

                <div class="overflow-x-auto">
                    <table class="table">
                        <!-- head -->
                        <thead>
                        <tr>
                            <th>
                                <label>
                                    <input type="checkbox" class="checkbox" />
                                </label>
                            </th>
                            <th>تعداد</th>
                            <th>وزن </th>
                            <th>Favorite Color</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                       @foreach($order->orderItems as $item)
                        <tr>

                            <td>
                                <div class="flex items-center gap-3">
                                    <div class="avatar">
                                        <div class="mask mask-squircle h-12 w-12">
                                            <img
                                                src="{{ $item->product->images()->first()->file_path }}"
                                                alt="{{ $item->product->name }}" />
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-bold">{{ $item->product->name }}</div>
                                        <div class="text-sm opacity-70">{{ $item->variant->type }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                               {{ $item->quantity }} {{ $item->product->unit }}
                                <br />
                                <span class="text-gray-500">{{ number_format($item->price * $item->quantity) }}</span>

                            </td>
                            <td>{{ $item->variant->weight }}</td>
                            <th>
                                <button class="btn btn-ghost btn-xs">details</button>
                            </th>
                        </tr>
                       @endforeach
                        </tbody>
                        <!-- foot -->
                        <tfoot>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Job</th>
                            <th>Favorite Color</th>
                            <th></th>
                        </tr>
                        </tfoot>
                    </table>
                </div>



            </div>


        </div>
    </div>


</div>
