<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Blog\BlogList;
use App\Livewire\Admin\Blog\BlogNew;
use App\Livewire\Admin\Blog\BlogCategories;

Route::prefix('master')->as('master.')->group(function () {
    Route::get('/', Dashboard::class)->name('dashboard');
    Route::post('/ckeditor/upload', \App\Livewire\Admin\Upload::class . '@uploadImage')->name('file.upload');

    Route::prefix('blog')->as('blog.')->group(function () {
        Route::get('/list', BlogList::class)->name('list');
        Route::get('/new', BlogNew::class)->name('new');
        Route::get('/categories', BlogCategories::class)->name('categories');
    });
});

