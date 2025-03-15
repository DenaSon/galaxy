<div class="container mx-auto">
    <x-card separator progress-indicator title="مدیریت ساختمان" subtitle="                مدیران و صاحبان ساختمان می‌توانند با ثبت اطلاعات ساختمان خود در لیفت‌پال، درخواست‌های تعمیر و سرویس آسانسور را به تکنسین‌های معتبر ارسال کنند.
" shadow>


        @if(Auth::user()->hasBuilding())

            <x-collapse class="mb-4" wire:model="show">
                <x-slot:heading>
                    ساختمان های ثبت شده
                </x-slot:heading>
                <x-slot:content>


                    <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
                        <table class="table table-zebra">
                            <!-- head -->
                            <thead>
                            <tr>
                                <th>#</th>
                                <th> نام ساختمان</th>

                                <th>اقدامات</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($buildings as $building)
                                <tr wire:key="{{$building->id}}">
                                    <th>{{ $building->id }}</th>
                                    <td class="font-black">{{ $building->builder_name }} {{ $building->floors }} طبقه |
                                        پلاک {{ $building->identify }} </td>


                                    <td>
                                        <x-button data-tip="حذف ساختمان" spinner="removeBuilding"
                                                  wire:click="removeBuilding({{$building->id}})"
                                                  wire:confirm="ساختمان انتخاب شده حذف شود؟" icon="o-trash"
                                                  class="tooltip btn-warning text-white btn-xs m-1"/>
                                        <x-button data-tip="خدمات ساختمان"
                                                  link="{{ route('service.building-management', ['building' => $building->id]) }}
"
                                                  icon="o-squares-2x2"
                                                  class="tooltip btn-success text-white btn-xs m-1"/>

                                    </td>


                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>


                </x-slot:content>
            </x-collapse>

        @endif
        @php
            $isNameEmpty = optional(Auth::user())->first_name == null && optional(Auth::user())->last_name == null;
        @endphp

        <div class="grid grid-cols-2 gap-6 mb-4">
            <x-input inline label="نام" wire:model.live.debounce.150ms="first_name" class="mb-2"
            />
            <x-input inline label="نام خانوادگی" wire:model.live.debounce.150ms="last_name" class="mb-2"
            />
        </div>


        <div class="grid grid-cols-2 gap-6 mb-4">
            <x-input clearable inline label="نام ساختمان" wire:model="builder_name"/>
            <x-input type="number" clearable inline label="تعداد طبقات" wire:model="floors"/>
        </div>

            <div class="grid grid-cols-2 gap-6 mb-4">
                <x-select
                    wire:dirty.attr="disabled"
                    inline
                    placeholder="انتخاب"
                    label="انتخاب استان"
                    icon="o-user"
                    :options="$province_list"
                    wire:model.live.debounce.2ms="province"
                    class="mb-1"
                    wire:loading.attr="disabled"
                    wire:target="updatedProvince"
                />
                <x-select wire:target="updatedProvince" placeholder="انتخاب" wire:loading.attr="disabled" inline
                          label="انتخاب شهر" icon="o-user" :options="$city_list" wire:model="city" class="mb-2"/>
            </div>


            <div class="grid grid-cols-2 gap-6 mb-4">
            <x-input type="number" clearable inline label="شماره تلفن اضطراری" wire:model="emergency_contact"/>
            <x-input type="number" clearable inline label="پلاک" wire:model="identify"/>
        </div>

        <b>انتخاب آدرس روی نقشه</b>
        <div wire:ignore id="map" class="map shadow mb-4"></div>

        <x-textarea wire:model="address" label="آدرس ساختمان" placeholder="آدرس ساختمان را ابتدا روی نقشه مشخص کنید"/>

        <x-input hidden id="latitude" wire:model="latitude"/>
        <x-input hidden id="longitude" wire:model="longitude"/>


        <x-slot:actions>

            <x-button wire:confirm="ساختمان جدید ثبت شود؟" label="ثبت ساختمان" class="btn-primary btn-block"
                      type="submit" spinner="saveBuilding"
                      wire:click.debounce.200ms="saveBuilding"/>
        </x-slot:actions>


    </x-card>


</div>
