<div>
    <div>

        <div class="flex flex-col md:flex-row md:space-x-4">
            <div class="w-full md:w-1/4 shadow-lg m-2">

                <x-stat
                    title="کل محصولات"
                    class="text-blue-700"
                    color="text-blue-500"
                    description="همه"
                    value="{{ $totalProductsCount }}"
                    icon="fas.shop"
                    />

            </div>

            <div class="w-full md:w-1/4 shadow-lg m-2">

                <x-stat
                    title="محصولات فعال"
                    class="text-green-600"
                    color="text-green-500"
                    description="فعال"
                    value="{{ $activeProductsCount }}"
                    icon="o-shopping-bag"
                    />

            </div>

            <div class="w-full md:w-1/4 shadow-lg m-2">

                <x-stat
                    title="دیدگاه"
                    class="text-yellow-600"
                    color="text-yellow-500"
                    description="همه دیدگاه ها"
                    value="{{ $totalCommentsCount }}"
                    icon="fas.comments"
                />

            </div>

            <div class="w-full md:w-1/4 shadow-lg m-2">

                <x-stat
                    title="بازدید"
                    class="text-orange-600"
                    color="text-orange-500"
                    description="بازدید محصولات"
                    value="{{ $viewsCount }}"
                    icon="fas.eye"
                />

            </div>



        </div>
    </div>

</div>
