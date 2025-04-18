# 🇮🇷 Iran Locations for Laravel
🌾 اطلاعات موقعیت مکانی ایران (استان‌ها و شهرها)

[![Latest Version on Packagist](https://img.shields.io/packagist/v/denason/iran-location.svg?style=flat-square)](https://packagist.org/packages/denason/iran-location)
[![License: MIT](https://img.shields.io/badge/License-MIT-blue.svg?style=flat-square)](LICENSE)
[![Laravel](https://img.shields.io/badge/Laravel-10.x-orange.svg?style=flat-square)](https://laravel.com)
[![Tests](https://img.shields.io/badge/tests-passing-brightgreen.svg?style=flat-square)](#)
[![Total Downloads](https://img.shields.io/packagist/dt/denason/iran-location.svg?style=flat-square)](https://packagist.org/packages/denason/iran-location)

---

## 🌾 اطلاعات موقعیت مکانی ایران (استان‌ها و شهرها)

این پکیج لاراول، لیست کامل **استان‌های ایران** و **شهرهای وابسته به هر استان** را فراهم می‌کند.

A professional and extendable Laravel package for accessing **all Iranian provinces and their cities**.

---

## ✨ ویژگی‌ها

- 🌍 لیست کامل استان‌ها و شهرهای ایران
- 🔗 رابطه‌ی یک‌به‌چند بین استان‌ها و شهرها
- ⚡ فراخوانی ساده از طریق Facade و Helper
- 🔎 قابلیت دریافت شهرها براساس ID یا نام استان
- 🌐 پشتیبانی از نام فارسی (و در آینده: انگلیسی)
- 🧰 مناسب برای پروژه‌های فرم‌محور
- ⚙️ کشینگ برای افزایش سرعت و کارایی

---

## 📦 نصب پکیج

```bash
composer require denason/iran-location
```

---

## ⚙️ مراحل نصب و راه‌اندازی

```bash
php artisan iran-location:install
```

- اجرای مایگریشن‌ها
- اجرای Seeder برای استان‌ها و شهرها

---

## 🚀 استفاده از پکیج

### Facade:

```php
use Denason\IranLocation\Facades\IranLocation;

$provinces = IranLocation::getProvinces();
```

### Helper:

```php
$provinces = iranLocation()->getProvinces();
$cities = iranLocation()->getCitiesByProvinceId(1);
```

## ⚖️ متدهای قابل استفاده

| Method | Description |
|--------|-------------|
| `getProvinces()` | دریافت تمام استان‌ها |
| `getProvinceById($id)` | دریافت استان بر اساس ID |
| `getProvinceByName($name)` | دریافت استان بر اساس نام |
| `getCities()` | دریافت تمام شهرها |
| `getCitiesByProvinceId($provinceId)` | دریافت شهرهای یک استان بر اساس ID |
| `getCitiesByProvinceName($provinceName)` | دریافت شهرهای یک استان بر اساس نام |
| `getCityById($id)` | دریافت یک شهر خاص بر اساس ID |
| `getCityByName($name)` | دریافت یک شهر خاص بر اساس نام |
| `getProvincesWithCities()` | دریافت همه استان‌ها همراه با لیست شهرها |
| `getProvinceOfCityId($cityId)` | دریافت استان مربوط به یک شهر بر اساس ID |
| `getProvinceOfCityName($cityName)` | دریافت استان مربوط به یک شهر بر اساس نام |




