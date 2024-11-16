<div class="bg-white py-4 border-b border-gray-200 mt-5 mb-4">
    <div class="container mx-auto flex flex-wrap items-center justify-between px-4 lg:px-8">

        <div class="flex items-center space-x-2">
            <x-badge value="DenaPax" class="bg-blue-700 text-white"/>
        </div>


        <div class="hidden lg:flex space-x-4 text-gray-600 text-sm">
            <span class="ms-2 font-normal">تلفن پشتیبانی   {{ getSetting('support_phone') ?? 0 }}  </span> &nbsp; &nbsp;
            <span class="text-xs">   از ساعت 8 تا 22   </span>
        </div>
    </div>


    <div class="container mx-auto mt-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 px-4 lg:px-8">



        <div class="flex flex-col items-center text-center">
            <x-icon name="o-check-badge" class="w-10 h-10 text-bold text-orange-500"/>

            <span class="text-gray-700 font-medium mt-2 text-xs">ضمانت کیفیت ارگانیک</span>
        </div>




        <div class="flex flex-col items-center text-center">
            <x-icon name="o-information-circle" class="w-10 h-10 text-bold text-blue-500"/>
            <span class="text-xs text-gray-700 font-medium mt-2">پشتیبانی و پاسخگویی</span>
        </div>




        <div class="flex flex-col items-center text-center">
            <x-icon name="o-shield-check" class="w-10 h-10 text-bold text-green-400"/>
            <span class="text-xs text-gray-700 font-medium mt-2">پرداخت امن</span>
        </div>



        <div class="flex flex-col items-center text-center">

           <x-icon name="o-truck" class="w-10 h-10 text-bold text-yellow-500"/>

            <span class="text-xs text-gray-700 font-medium mt-2">تحویل سریع</span>
        </div>




    </div>
</div>
