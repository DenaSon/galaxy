<x-card title="گزارش‌ها" subtitle="درخواست‌های شهر {{ $technicianCity }}"
        separator
        class="shadow-2xl border w-full">
    <div class="overflow-x-auto">
        <table class="table">

            <thead>
            <tr>
                <th>#</th>
                <th>وضعیت</th>

                <th>اقدامات</th>
            </tr>
            </thead>
            <tbody>

            @forelse($requests as $request)

                <tr wire:key="request-list-{{$request->id}}"
                    class="hover @if($request->status == 'approved') border border-success  @endif">


                    <td>  @if($request->status =='pending')
                            <x-progress class="progress-warning h-0.6" indeterminate/>

                        @else
                            {{ $request->referral }}
                        @endif

                    </td>

                    <td class="text-xs badge
badge-{{ $request->status == 'rejected' ? 'error' : ($request->status == 'approved' ? 'success' : ($request->status == 'pending' ? 'warning' : 'secondary')) }}

                 badge-outline m-1"> {{ $request->translateStatus($request->status) }}
                        @if($request->status == 'pending')
                            <x-loading class="loading-infinity"/>

                        @endif
                    </td>

                    <td class="px-4 py-2">
                        <div class="flex gap-x-2 items-center gap-y-3">

                            @if($request->status == 'pending')
                                @livewire('app.services.components.technician.request-action',['building' => $request->building_id,'request'=>$request->id],key($request->id))
                            @endif

                            @if($request->lat != null && $request->lng != null)
                                @livewire('app.services.components.static-map',['building' => $request->building_id,'request'=>$request->id],key($request->id))
                            @endif


                        </div>
                    </td>
                </tr>
            @empty

                <b>گزارشی ثبت نشده</b>

            @endforelse

            </tbody>
        </table>

        {{ $requests->links() }}
    </div>


</x-card>
