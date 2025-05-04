<div>

    <x-card subtitle="لیست کاربران" separator="">

        <div class="overflow-x-auto">
            <table class="table table-zebra">

                <thead>
                <tr>
                    <th>#</th>
                    <th>نام</th>
                    <th>شماره</th>

                    <th>
                        تعداد خرید
                        <a role="button" wire:click="toggleSort">#</a>
                    </th>
                    <th>
                        ساخنمان
                    </th>
                    <th> نقش</th>
                    <th>تاریخ ثبت‌نام</th>

                </tr>
                </thead>
                <tbody>

                @foreach($users as $index => $user)

                    <tr wire:key="{{ $user->id }}" @if($user->created_at->isToday()))
                        class="text-pink-700 font-bold" @endif>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $user?->first_name ?? 'N/A' }} {{ $user?->last_name ?? 'N/A' }}</td>
                        <td>{{ $user?->phone }}</td>
                        <td class="text-xs font-thin">
                            {{ $user?->orders_count ?? 0 }} سفارش
                            <br>
                            {{ $user->orders->sum('order_items_sum_quantity') }} محصول

                        </td>

                        <td>
                            @if($user->hasBuilding())
                                <x-icon name="o-hand-thumb-up" class="text-success"/>
                            @else
                                <x-icon name="o-hand-thumb-down" class="text-gray-700"/>
                            @endif
                        </td>
                        <td class="text-xs" title="">

                            @foreach($user->roles()->get() as $role)

                                {{ __('roles.' . $role->name) }},

                            @endforeach


                        </td>

                        <td>
                            {{ jdate($user->created_at)->toFormattedDateTimeString() }}
                        </td>
                    </tr>

                @endforeach


                </tbody>
            </table>

            {{ $users->links() }}
        </div>

    </x-card>


</div>
