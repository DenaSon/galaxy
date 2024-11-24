<div class="flex justify-center">
    <x-card shadow class="sm:w-2/6 shadow-2xl flex flex-col items-center justify-center p-6">
        <x-icon name="o-check-circle" class="text-lg text-green-500 w-16 h-16"></x-icon>
        <span class="p-2 font-bold text-center text-green-600">پرداخت با موفقیت انجام شد! 🎉</span>
        <p class="text-sm text-gray-700 text-center mt-2">
            تراکنش شما با موفقیت ثبت شد. از خرید شما سپاسگزاریم!
        </p>
        <div class="mt-4 text-sm text-gray-600">
            ✨ <strong>جزئیات سفارش:</strong>
            <ul class="list-disc list-inside mt-2">
                <li>کد رهگیری: <span class="font-bold text-gray-800">#{{ $order->id ?? 0 }}</span></li>
                <li>تاریخ پرداخت: <span class="font-bold text-gray-800">{{ jdate($order->creeated_at?? '')->toFormattedDateString() ?? 0 }}</span></li>
                <li>مبلغ: <span class="font-bold text-gray-800">{{ number_format($order->grand_total ?? 0) }}</span></li>
            </ul>
        </div>
        <div class="mt-4 text-sm text-gray-600">
            🛒 <strong>چه کاری انجام دهیم؟</strong>
            <ol class="list-decimal list-inside mt-2">
                <li>سفارش شما در حال پردازش است و به زودی ارسال خواهد شد.</li>
                <li>برای مشاهده وضعیت سفارش، به <a href="{{ route('panel.profile.profileDashboard') }}" class="text-blue-500 hover:underline">پروفایل کاربری</a> خود مراجعه کنید.</li>
                <li>اگر سوالی دارید، تیم پشتیبانی ما آماده پاسخ‌گویی است!</li>
            </ol>
        </div>
        <div class="mt-4 text-sm text-gray-600">
            📞 <strong>تماس با ما:</strong>
            <p class="mt-2">شماره پشتیبانی: <a href="tel:{{ getSetting('support_phone') }}" class="text-blue-500">{{ getSetting('support_phone') }}</a></p>
            <p>ایمیل: <a href="mailto:{{ getSetting('support_email') }}" class="text-blue-500 hover:underline">{{ getSetting('support_email') }}</a></p>
        </div>
        <a href="{{ route('home.index-home') }}" class="mt-6 text-blue-600 font-bold hover:underline">🏠 بازگشت به صفحه اصلی</a>
        <p class="mt-4 text-xs text-gray-500 text-center">
            از همراهی شما سپاسگزاریم و امیدواریم تجربه‌ای عالی برایتان رقم زده باشیم. 🌟
        </p>
    </x-card>
</div>
