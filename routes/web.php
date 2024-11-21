<?php

use App\Livewire\Admin\Blog\Categories;
use App\Livewire\Admin\Blog\CreateBlog;
use App\Livewire\Admin\Blog\EditBlog;
use App\Livewire\Admin\Blog\ListBlog;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Shop\CreateAttribute;
use App\Livewire\Admin\Shop\CreateProduct;
use App\Livewire\Admin\Shop\ListProduct;
use App\Livewire\Admin\Shop\Orders\OrderList;
use App\Livewire\App\Blog\SingleBlog;
use App\Livewire\App\Home\HomeIndex;
use App\Livewire\App\Shop\ProductList;
use App\Livewire\App\Shop\SingleProduct;
use Illuminate\Support\Facades\Route;


Route::name('home.')->group(function () {

    Route::get('/', HomeIndex::class)->name('index-home');

    Route::prefix('store')->name('product.')->group(function () {

        Route::get('product/{product}/{slug}', SingleProduct::class)->name('singleProduct');
        Route::get('category/{category}/{slug}', ProductList::class)->name('singleCategory');

    });


    Route::prefix('blog')->name('blog.')->group(function () {

        Route::get('/{blog}/{slug}', SingleBlog::class)->name('singleBlog');

    });


});

Route::name('panel.')->group(function () {

    Route::prefix('profile')->name('profile.')->group(function () {

        Route::get('/payment/callback', SingleProduct::class)->name('singleProduct');

    });

});







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


    // Shop subgroup
    Route::prefix('shop')->name('shop.')->group(function () {
        Route::get('create', CreateProduct::class)->name('create');
        Route::get('list', ListProduct::class)->name('list');
        Route::get('categories', \App\Livewire\Admin\Shop\Categories::class)->name('categories')->lazy();
        Route::get('attribute', CreateAttribute::class)->name('attribute')->lazy();
        Route::get('orders', OrderList::class)->name('orders')->lazy();

    });


});
