# 📦 Laravel Neshan

پکیج **`laravel-neshan`** یک واسط توسعه‌پذیر و قابل‌اطمینان برای تعامل با [API نقشه نشان](https://platform.neshan.org/) در Laravel است که تمامی سرویس‌های اصلی نقشه نشان را پوشش می‌دهد.
این پکیج با طراحی مبتنی بر اصول SOLID و پیاده‌سازی ماژولار، امکان استفاده از قابلیت‌هایی نظیر مسیریابی، جستجو، تبدیل آدرس و مختصات، نگاشت مسیر، و دریافت نقشه‌های ایستا را به‌صورت یکپارچه در پروژه‌های لاراولی فراهم می‌کند. هدف اصلی این پکیج، تسهیل استفاده از APIهای نشان در محیط Laravel و افزایش بهره‌وری توسعه‌دهندگان در پروژه‌های واقعی است.
---

## ✅ امکانات پشتیبانی‌شده

- 🗺️ Static Map
- 📍 Geocoding
- 🧭 Reverse Geocoding
- 🔎 Search
- 🚦 Direction
- 📊 Map Matching

---

## ⚙️ نصب

```bash
composer require denason/laravel-neshan
```

---

## 🔐 پیکربندی

در فایل `.env` مقداردهی زیر را انجام دهید:

```env
NESHAN_API_BASE_URL=https://api.neshan.org
NESHAN_MAP_API_KEY=service.f0b032318487462a8dfa467aff93408a
NESHAN_SERVICE_API_KEY=service.a53814e21deb45bfa47e97804674b1b2
```

سپس فایل پیکربندی را منتشر کنید:

```bash
php artisan vendor:publish --tag=neshan-config
```

---

## 🚀 نمونه استفاده (سرویس Direction)

```php
$response = Neshan()
    ->direction()
    ->origin(35.6892, 51.3890)
    ->destination(35.7000, 51.4000)
    ->type('car')
    ->withTraffic()
    ->avoidOddEvenZone()
    ->avoidTrafficZone()
    ->alternative()
    ->bearing(90)
    ->get();
```

---

## 📚 مستندات

مستندات کامل هر سرویس به‌زودی در بخش Wiki منتشر خواهد شد.

---

## 🪪 مجوز

این پکیج تحت [MIT License](LICENSE) منتشر شده است.
