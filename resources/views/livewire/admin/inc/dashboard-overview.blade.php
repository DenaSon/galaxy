<div class="flex flex-col md:flex-row md:space-x-4" wire:init="overview">


    <div class="w-full md:w-1/4 shadow-lg m-2">

        <x-stat
            title="کاربران"
            description="همه کاربران"
            value="{{ $usersCount }}"
            icon="o-user-plus"
         />

    </div>


    <div class="w-full md:w-1/4 shadow-lg m-2">

        <x-stat
            title="سفارش‌ها"
            description="کل فروش"
            value="{{ $ordersCount }}"
            icon="o-shopping-cart"
            class="text-blue-500"
            color="text-blue-500"
        />

    </div>



    <div class="w-full md:w-1/4 shadow-lg m-2">

        <x-stat
            title="تعداد محصول"
            description="محصول فروخته شده"
            value="{{ $orderItemsCount }}"
            icon="o-arrow-trending-down"
            class="text-orange-500"
            color="text-orange-500"
        />

    </div>


    <div class="w-full md:w-1/4 shadow-lg m-2">

        <x-stat
            title="فروش"
            description="مجموع فروش"
            value="{{ number_format($ordersSum) }}"
            icon="o-currency-dollar"
            class="text-green-500"
            color="text-green-500"
          />

    </div>




</div>
