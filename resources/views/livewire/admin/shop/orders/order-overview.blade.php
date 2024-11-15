<div>
    <div>

        <div class="flex flex-col md:flex-row md:space-x-4">
            <div class="w-full md:w-1/4 shadow-lg m-2">

                <x-stat
                    title="تعداد "
                    class="text-blue-700"
                    color="text-blue-500"
                    description="شفارش‌ها"
                    value="{{ $totalCount }}"
                    icon="o-list-bullet"
                />

            </div>

            <div class="w-full md:w-1/4 shadow-lg m-2">

                <x-stat
                    title="مبلغ کل"
                    class="text-green-600"
                    color="text-green-500"
                    description="کل واریزی"
                    value="{{ number_format($totalPayment) }}"
                    icon="o-currency-dollar"
                />

            </div>

            <div class="w-full md:w-1/4 shadow-lg m-2">

                <x-stat
                    title="امروز"
                    class="text-yellow-600"
                    color="text-yellow-500"
                    description="واریز امروز"
                    value="{{ number_format($todayPayment) }}"
                    icon="o-calendar-days"
                />

            </div>

            <div class="w-full md:w-1/4 shadow-lg m-2">

                <x-stat
                    title="هفته"
                    class="text-orange-600"
                    color="text-orange-500"
                    description="واریز هفته"
                    value="{{ number_format($weekPayment) }}"
                    icon="o-calendar"
                />

            </div>



        </div>
    </div>

</div>
