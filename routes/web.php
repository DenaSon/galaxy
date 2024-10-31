<?php

use App\Livewire\Admin\Blog\Categories;
use App\Livewire\Admin\Blog\CreateBlog;
use App\Livewire\Admin\Blog\ListBlog;
use App\Livewire\Admin\Dashboard;
use Illuminate\Support\Facades\Route;
Use Livewire\Volt\Volt;

// Master group
Route::prefix('master')->name('master.')->group(function () {
    // Master Dashboard route
    Route::get('/', Dashboard::class)->name('dashboard');

    // Blog subgroup
    Route::prefix('blog')->name('blog.')->group(function () {
        Route::get('/create',CreateBlog::class)->name('create');
        Route::get('/list',ListBlog::class)->name('list');
        Route::get('/categories',Categories::class)->name('categories');
    });
});
