<div class="flex justify-center">
    <x-card shadow class="sm:w-2/6  shadow-2xl flex flex-col items-center justify-center p-6">
        <x-icon name="o-exclamation-triangle" class="text-lg text-red-500 w-16 h-16"></x-icon>
        <span class="p-2 font-bold text-center text-red-600">پرداخت ناموفق</span>
        <p class="text-sm text-gray-700 text-center mt-2">
            پرداخت شما به دلایلی({{ $paymentErrorMessage }}) ناموفق بود.
        </p>
        <div class="mt-4 text-sm text-gray-600">
            🔍 <strong>چه اتفاقی افتاده؟</strong>
            <ul class="list-disc list-inside mt-2">
                <li>ممکن است اطلاعات کارت بانکی به‌درستی وارد نشده باشد.</li>
                <li>اتصال اینترنت شما کمی ناپایدار بوده است.</li>
                <li>یا شاید مشکلی در درگاه بانکی پیش آمده باشد.</li>
            </ul>
        </div>
        <div class="mt-4 text-sm text-gray-600">
            ✨ <strong>چه کاری انجام دهیم؟</strong>
            <ol class="list-decimal list-inside mt-2">
                <li>اطلاعات کارت خود را دوباره بررسی کنید.</li>
                <li>از پایدار بودن اینترنت خود مطمئن شوید.</li>
                <li>اگر نیاز به کمک دارید، تیم پشتیبانی ما اینجاست!</li>
            </ol>
        </div>
        <div class="mt-4 text-sm text-gray-600">
            📞 <strong>تماس با ما:</strong>
            <p class="mt-2">شماره پشتیبانی: <a href="tel:{{ getSetting('support_phone') }}" class="text-blue-500">{{ getSetting('support_phone') }}</a></p>
            <p>ایمیل: <a href="mailto:{{ getSetting('support_email') }}" class="text-blue-500 hover:underline">{{ getSetting('support_email') }}</a></p>
        </div>
        <div class="text-center mt-2">
            <a wire:navigate href="{{ route('panel.checkout') }}" class="mt-6 text-blue-600 font-bold hover:underline">💳 تلاش دوباره برای پرداخت</a>
        </div>
        <p class="mt-4 text-xs text-gray-500 text-center">
            ما قدردان صبر و همراهی شما هستیم و تمام تلاشمان را می‌کنیم تا تجربه‌ای بی‌نقص برایتان فراهم کنیم. 🌟
        </p>
    </x-card>
</div>
