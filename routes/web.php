<?php

use App\Livewire\Admin\Blog\Categories;
use App\Livewire\Admin\Blog\CreateBlog;
use App\Livewire\Admin\Blog\EditBlog;
use App\Livewire\Admin\Blog\ListBlog;
use App\Livewire\Admin\Dashboard;
use Illuminate\Support\Facades\Route;

// Master group
Route::prefix('master')->name('master.')->group(function () {
    // Master Dashboard route
    Route::get('/', Dashboard::class)->name('dashboard')->lazy();
    Route::get('system/setting', \App\Livewire\Admin\System\Setting::class)->name('setting')->lazy();

    // Blog subgroup
    Route::prefix('blog')->name('blog.')->group(function () {
        Route::get('create', CreateBlog::class)->name('create');
        Route::get('edit/{blog}', EditBlog::class)->name('edit');
        Route::get('list', ListBlog::class)->name('list')->lazy();
        Route::get('categories', Categories::class)->name('categories')->lazy();
    });
});
