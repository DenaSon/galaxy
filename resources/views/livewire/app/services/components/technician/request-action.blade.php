<div class="inline-block me-2">
    <x-modal title=" درخواست {{ $request->referral }}" wire:model="requestActionModal"
             subtitle="ساختمان {{ $building->builder_name ?? 'N/A' }} با مالکیت  {{ $building->user?->first_name ?? 'N/A' }} {{ $building->user?->last_name ?? 'N/A' }}"
             wire:key="request-action-{{$request->id}}" class="p-0 m-0 overflow-hidden">


        <div class="max-w-2xl mx-auto bg-white shadow-md rounded-2xl p-6 space-y-2">
            <div>


                <h3 class="text-lg font-bold text-gray-700 mb-2">شرح </h3>
                <p class="text-gray-600">
                    {{ $request->description }}

                    <br/>
                    <b>زمان ارسال:</b>
                <p>

                    {{ jdate($request->created_at)->toFormattedDateTimeString() }}
                </p>
            </div>

            <x-hr/>

            <div>
                <h3 class="text-md font-semibold text-gray-700 mb-1">جزئیات</h3>
                <p class="text-sm italic text-gray-500">{{ $request->details }}</p>
            </div>

            <br/>

            <div class="flex justify-center items-center gap-4">

                <x-button
                    wire:click="confirmRequest"
                    wire:confirm="درخواست را تایید میکنید؟"
                    label="تایید درخواست"
                    class="btn btn-success px-6 text-white btn-sm font-normal hover:opacity-90 transition"
                    icon="o-hand-thumb-up"
                    aria-label="تایید درخواست"
                />

                <x-button
                    onclick="return confirm('برقراری تماس با مالک ساختمان؟')"
                    external
                    label="تماس"
                    class="btn btn-info px-6 text-white btn-sm font-normal hover:opacity-90 transition"
                    icon="o-phone"
                    aria-label="تماس"
                    link="tel:{{ $building->user->phone }}"
                />


            </div>


        </div>


    </x-modal>

    <x-button responsive icon="o-eye" @click="$wire.requestActionModal = true"
              class="btn-info btn-xs text-white tooltip" data-tip="مشاهده"/>

</div>
