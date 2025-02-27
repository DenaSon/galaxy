<?php
$services = [
    [
        'id' => 1,
        'service_title' => 'خدمات ویژه تکنسین‌ها',
        'service_description' => 'لیفت‌پال با ارائه درخواست‌های نصب، تعمیر و نگهداری آسانسور، تکنسین‌ها را به مشتریان متصل می‌کند. دریافت پروژه‌های جدید و مدیریت سفارش‌ها، سریع و آسان!',
        'service_image' => asset('static/services/technician-service.webp'),
        'service_link' => route('home.blog.indexBlog'),

    ],
    [
        'id' => 2,
        'service_title' => 'سرویس دوم',
        'service_description' => 'توضیحات سرویس دوم.',
        'service_image' => 'http://127.0.0.1:8000/storage/product_images/1.jpg',
        'service_link' => 'example.com',

    ],

];
?>

@foreach ($services as $service)
    @livewire('app.services.components.service-card',key($service['id']),[
        'service_title' => $service['service_title'],
        'service_description' => $service['service_description'],
        'service_image' => $service['service_image'],
        'service_link' => $service['service_link']
    ])
@endforeach
